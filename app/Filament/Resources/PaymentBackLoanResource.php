<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentBackLoanResource\Pages;
use App\Filament\Resources\PaymentBackLoanResource\RelationManagers;
use App\Models\Payment;
use App\Models\PaymentBackLoan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentBackLoanResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationGroup = 'Pembayaran';
    protected static ?string $pluralLabel = 'Pembayaran Pinjaman';

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->whereHas('user', function ($userQuery) {
                    $userQuery->where('role_id', 2);
                });
            })
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Pembayaran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'ACCEPTED', 'Accepted', 'accepted' => 'success',
                        'PENDING', 'Pending', 'pending' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('order_id')
                    ->label('Order ID'),

                Tables\Columns\TextColumn::make('loan_id')
                    ->label('ID Pinjaman'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pembayar'),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah Pembayaran')
                    ->money('idr'),

                Tables\Columns\TextColumn::make('payment_date')
                    ->label('Waktu Pembayaran'),

                Tables\Columns\TextColumn::make('payment_link')
                    ->label('Link Pembayaran')
                    ->toggleable(isToggledHiddenByDefault: true)


            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('status')
                    ->action(fn (Payment $record) => $record->verifyPaymentLoan())
                    ->requiresConfirmation()
                    ->button()
                    ->modalIcon('heroicon-s-check')
                    ->modalDescription('Verifikasi pembayaran untuk pendanaan? Anda tidak bisa membatalkan transaksi ini setelah terverifikasi.')
                    ->modalCancelActionLabel('Batal')
                    ->modalSubmitActionLabel('Lanjut')
                    ->label('VERIFIKASI'),

                ActionGroup::make([
                    ViewAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentBackLoans::route('/'),
            'create' => Pages\CreatePaymentBackLoan::route('/create'),
            'view' => Pages\ViewPaymentBackLoan::route('/{record}'),
            'edit' => Pages\EditPaymentBackLoan::route('/{record}/edit'),
        ];
    }
}

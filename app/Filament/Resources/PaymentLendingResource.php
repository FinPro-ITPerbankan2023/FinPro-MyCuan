<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentLendingResource\Pages;
use App\Filament\Resources\PaymentLendingResource\RelationManagers;
use App\Models\Loans;
use App\Models\Payment;
use App\Models\PaymentLending;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentLendingResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $pluralModelLabel = 'Pembayaran Pendanaan';
    protected static ?string $navigationGroup = 'Pembayaran';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->label('Status Pembayaran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'accepted' => 'success',
                        'pending' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('order_id')
                    ->label('Order ID'),

                Tables\Columns\TextColumn::make('loan_id')
                    ->label('ID Pinjaman'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pendana'),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah Pendanaan')
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
                    ->action(fn (Payment $record) => $record->verifyPayment())
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentLendings::route('/'),
            'create' => Pages\CreatePaymentLending::route('/create'),
//            'view' => Pages\ViewPaymentLending::route('/{record}'),
//            'edit' => Pages\EditPaymentLending::route('/{record}/edit'),
        ];
    }
}

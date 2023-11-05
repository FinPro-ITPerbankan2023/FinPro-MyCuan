<?php

namespace App\Filament\Lender\Resources;

use App\Filament\Lender\Resources\LoanApplicationsResource\Pages;
use App\Filament\Lender\Resources\LoanApplicationsResource\RelationManagers;
use App\Models\HistoryTransaction;
use App\Models\LoanApplications;
use App\Models\Loans;
use App\Models\new_identity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class LoanApplicationsResource extends Resource
{
    protected static ?string $model = Loans::class;

    protected static ?string $modelLabel = 'Daftar Ajuan Pinjaman';

    protected static ?string $pluralLabel = 'Daftar Ajuan Pinjaman';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Marketplace';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([//
            ]
                );
    }

    public static function table(Table $table): Table
    {

        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('is_verified', 1)
                    ->where('loan_status', 0);
            })
            ->columns([

                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('loan_status')
                    ->badge()
                    ->color(fn (bool $state): string => match ($state) {
                        false => 'danger',
                        true => 'success',
                    })
                    ->formatStateUsing(fn (bool $state): string => $state ? __("SUDAH DIDANAI") : __("BELUM DIDANAI"))
                    ->label('Status Pinjaman'),

                Tables\Columns\TextColumn::make('loan_duration')
                    ->label('Lama Pinjaman (bulan)')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('application_date')
                    ->label('Tanggal Pengajuan')
                    ->date()
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah Pinjaman')
                    ->money('idr')
                    ->alignCenter(),
            ])
            ->filters([
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
                Action::make('loan_status')
                    ->action(fn (Loans $record) => $record->verifyLoan())
                    ->requiresConfirmation()
                    ->button()
                    ->label('DANAI')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                ]),
                Tables\Actions\BulkAction::make('Checkout')
                    ->action(function (Collection $records) {
                        $authenticatedUser = Auth::user();

                        $records->each(function ($record) use ($authenticatedUser) {
                            $dataToInsert = $record->toArray();

                            $dataToInsert['user_id'] = $authenticatedUser->id;

                            HistoryTransaction::create($dataToInsert);

                            $record->delete();

                        });
                    })
            ])
            ->striped()
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
            'index' => Pages\ListLoanApplications::route('/'),
//            'create' => Pages\CreateLoanApplications::route('/create'),
//            'view' => Pages\ViewLoanApplications::route('/{record}'),
//            'edit' => Pages\EditLoanApplications::route('/{record}/edit'),
        ];
    }
}

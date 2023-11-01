<?php

namespace App\Filament\Lender\Resources;

use App\Filament\Lender\Resources\HistoryTransactionResource\Pages;
use App\Filament\Lender\Resources\HistoryTransactionResource\RelationManagers;
use App\Models\HistoryTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoryTransactionResource extends Resource
{
    protected static ?string $model = HistoryTransaction::class;

    protected static ?string $modelLabel = 'Riwayat Mendanai';

    protected static ?string $pluralLabel = 'Riwayat Mendanai';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';

    protected static ?string $navigationGroup = 'Marketplace';

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
            ->columns([

                Tables\Columns\TextColumn::make('loan_id')
                    ->label('Nomor Pinjaman')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Peminjam')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('loan.amount')
                    ->label('Jumlah Pinjaman')
                    ->searchable()
                    ->sortable()
                    ->alignCenter()
                    ->money('idr'),

                Tables\Columns\TextColumn::make('transcation_date')
                    ->label('Waktu Transaksi')
                    ->date()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('lender')
                    ->label('Pendana')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListHistoryTransactions::route('/'),
            'create' => Pages\CreateHistoryTransaction::route('/create'),
            'view' => Pages\ViewHistoryTransaction::route('/{record}'),
            'edit' => Pages\EditHistoryTransaction::route('/{record}/edit'),
        ];
    }
}

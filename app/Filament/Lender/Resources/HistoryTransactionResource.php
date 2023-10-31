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

    protected static ?string $modelLabel = 'Riwayat Transaksi';

    protected static ?string $pluralLabel = 'Riwayat Transaksi';

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
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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

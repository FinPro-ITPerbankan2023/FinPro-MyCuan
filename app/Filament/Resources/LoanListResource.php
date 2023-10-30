<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanListResource\Pages;
use App\Filament\Resources\LoanListResource\RelationManagers;
use App\Models\LoanList;
use App\Models\Loans;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class LoanListResource extends Resource
{
    protected static ?string $model = Loans::class;
    protected static ?string $model2 = User::class;

    protected static ?string $model3 = Business::class;



    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $query = Loans::query()
            ->join('users', 'loans.user_id', '=', 'users.id')
            ->select('loans.*', 'users.name as user_name');

        $table->query($query);

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_name')
                    ->label('User Name'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Loan Amount')
                    ->money('idr')
            ])
            ->filters([
                //
            ])
            ->actions([
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoanLists::route('/'),
            'create' => Pages\CreateLoanList::route('/create'),
            'edit' => Pages\EditLoanList::route('/{record}/edit'),
        ];
    }
}

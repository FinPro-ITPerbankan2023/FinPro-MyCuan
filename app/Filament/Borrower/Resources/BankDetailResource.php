<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\BankDetailResource\Pages;
use App\Filament\Borrower\Resources\BankDetailResource\RelationManagers;
use App\Filament\Borrower\Resources\BankDetailResource\RelationManagers\BusinessRelationManager;
use App\Models\BankDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BankDetailResource extends Resource
{
    protected static ?string $model = BankDetail::class;

    protected static ?string $modelLabel = 'Informasi Bank';
    protected static ?string $pluralLabel = 'Informasi Bank';


    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('bank_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bank_number')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $userId = $user->id;
        return $table
            ->modifyQueryUsing(function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->columns([
                Stack::make([
                    Tables\Columns\TextColumn::make('bank_name')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('bank_number')
                        ->copyable(),
                ]),
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
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBankDetails::route('/'),
            'create' => Pages\CreateBankDetail::route('/create'),
            'view' => Pages\ViewBankDetail::route('/{record}'),
            'edit' => Pages\EditBankDetail::route('/{record}/edit'),
        ];
    }
}

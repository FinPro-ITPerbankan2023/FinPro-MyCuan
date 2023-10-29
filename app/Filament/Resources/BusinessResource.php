<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessResource\Pages;
use App\Filament\Resources\BusinessResource\RelationManagers;
use App\Models\Business;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Illuminate\Support\Collection;



class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;

    protected static ?string $navigationGroup = 'System Management';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('business_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('field_of_business')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('business_ownership')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('business_duration')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('income_avg')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('business_permit_image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('business_place_image')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('business_product_image')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('business_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('field_of_business')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_ownership')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('income_avg')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('business_permit_image'),
                Tables\Columns\ImageColumn::make('business_place_image'),
                Tables\Columns\ImageColumn::make('business_product_image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                BulkAction::make('delete')
                    ->action(fn (Collection $records) => $records->each->delete())
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
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
            'view' => Pages\ViewBusiness::route('/{record}'),
            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}

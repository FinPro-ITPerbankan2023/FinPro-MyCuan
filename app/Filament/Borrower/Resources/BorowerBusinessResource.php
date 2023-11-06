<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\BorowerBusinessResource\Pages;
use App\Filament\Borrower\Resources\BorowerBusinessResource\RelationManagers;
use App\Models\BorowerBusiness;
use App\Models\Business;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BorowerBusinessResource extends Resource
{
    protected static ?string $model = Business::class;
    protected static ?string $navigationGroup = 'Data Diri';

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $label = 'Profile Usaha';
    protected static ?string $pluralLabel = 'Profile Usaha';
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
        $user = Auth::user();
        $userId = $user->id;
        return $table
            ->modifyQueryUsing(function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->columns([
                Tables\Columns\TextColumn::make('business_name')
                    ->label('Nama Usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('field_of_business')
                    ->label('Bidang Usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_ownership')
                    ->label('Kepemilikan Usaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_duration')
                    ->label('Lama Usaha Berdiri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('income_avg')
                    ->label('Rata-Rata Penghasilan')
                    ->money('idr'),
                Tables\Columns\ImageColumn::make('business_permit_image')
                    ->label('Foto Izin Usaha')
                    ->disk('s3'),
                Tables\Columns\ImageColumn::make('business_place_image')
                    ->label('Foto Tempat Usaha')
                    ->disk('s3'),
                Tables\Columns\ImageColumn::make('business_product_image')
                    ->label('Foto Product Usaha')
                    ->disk('s3'),
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
            'index' => Pages\ListBorowerBusinesses::route('/'),
            'create' => Pages\CreateBorowerBusiness::route('/create'),
            'view' => Pages\ViewBorowerBusiness::route('/{record}'),
            'edit' => Pages\EditBorowerBusiness::route('/{record}/edit'),
        ];
    }
}

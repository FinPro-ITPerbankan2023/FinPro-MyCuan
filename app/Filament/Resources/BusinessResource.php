<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessResource\Pages;
use App\Filament\Resources\BusinessResource\RelationManagers;
use App\Models\Business;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Filament\Tables\Columns\ImageColumn;




class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;
    protected static ?string $pluralLabel = 'Bisnis Peminjam';
    protected static ?string $navigationGroup = 'Users Management';

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
                    ->disk('s3')
                    ->image()
                    ->required(),

                Forms\Components\FileUpload::make('business_place_image')
                    ->disk('s3')
                    ->image()
                    ->required(),

                Forms\Components\FileUpload::make('business_product_image')
                    ->disk('s3')
                    ->image()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->numeric()
                    ->sortable(),

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
                    ->label('Pendapatan per Bulan')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\ImageColumn::make('business_permit_image')
                    ->label('Foto Izin Usaha')
                    ->disk('s3')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\ImageColumn::make('business_place_image')
                    ->label('Foto Tempat Usaha')
                    ->disk('s3')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\ImageColumn::make('business_product_image')
                    ->label('Foto Produk Usaha')
                    ->disk('s3')
                    ->toggleable(isToggledHiddenByDefault: true),

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
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                BulkAction::make('delete')
                    ->action(fn (Collection $records) => $records->each->delete())
            ])
            ->striped()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make('Informasi Usaha')
                    ->icon('heroicon-o-building-storefront')
                    ->schema([
                        TextEntry::make('business_name')
                            ->label('Nama Usaha'),

                        TextEntry::make('field_of_business')
                            ->label('Bidang Usaha'),

                        TextEntry::make('business_duration')
                            ->label('Lama Usaha Berdiri'),

                        ImageEntry::make('business_permit_image')
                            ->disk('s3')
                            ->label('Foto Izin Usaha'),

                        ImageEntry::make('business_product_image')
                            ->disk('s3')
                            ->label('Foto Produk Usaha'),

                        ImageEntry::make('business_place_image')
                            ->disk('s3')
                            ->label('Foto Tempat Usaha'),
                    ]) ->columns(3),

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
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
//            'view' => Pages\ViewBusiness::route('/{record}'),
//            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}

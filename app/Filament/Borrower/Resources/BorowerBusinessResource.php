<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\BorowerBusinessResource\Pages;
use App\Filament\Borrower\Resources\BorowerBusinessResource\RelationManagers;
use App\Models\BorowerBusiness;
use App\Models\Business;
use Filament\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
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

                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),

                Forms\Components\TextInput::make('business_name')
                    ->label('Nama Usaha')
                    ->maxLength(255),

                Forms\Components\TextInput::make('field_of_business')
                    ->label('Bidang Usaha')
                    ->maxLength(255),

                Forms\Components\TextInput::make('business_ownership')
                    ->label('Kepemilikan Usaha')
                    ->maxLength(255),

                Forms\Components\TextInput::make('business_duration')
                    ->label('Lama Bisnis Berdiri')
                    ->maxLength(255),

                Forms\Components\TextInput::make('income_avg')
                    ->label('Penghasil per Bulan')
                    ->prefix('Rp.')
                    ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)
                    ->numeric(),

                Forms\Components\FileUpload::make('business_permit_image')
                    ->label('Foto Izin Usaha')
                    ->preserveFilenames()
                    ->image()
                    ->directory('business_permit_images')
                    ->visibility('private')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('business_place_image')
                    ->label('Foto Tempat Usaha')
                    ->preserveFilenames()
                    ->image()
                    ->directory('business_place_images')
                    ->visibility('private')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('business_product_image')
                    ->label('Foto Product Usaha')
                    ->preserveFilenames()
                    ->image()
                    ->directory('business_product_images')
                    ->visibility('private')
                    ->required()
                    ->columnSpanFull(),
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
                    ->label('Penghasilan per Bulan')
                    ->money('idr'),

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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
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
                            ->columnSpanFull()
                            ->label('Foto Izin Usaha'),

                        ImageEntry::make('business_product_image')
                            ->disk('s3')
                            ->columnSpanFull()
                            ->label('Foto Produk Usaha'),

                        ImageEntry::make('business_place_image')
                            ->disk('s3')
                            ->columnSpanFull()
                            ->label('Foto Tempat Usaha'),
                    ]) ->columns(3),

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
            'index' => Pages\ListBorowerBusinesses::route('/'),
            'create' => Pages\CreateBorowerBusiness::route('/create'),
//            'view' => Pages\ViewBorowerBusiness::route('/{record}'),
//            'edit' => Pages\EditBorowerBusiness::route('/{record}/edit'),
        ];
    }
}

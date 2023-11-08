<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserDetailResource\Pages;
use App\Filament\Resources\UserDetailResource\RelationManagers;
use App\Models\UserDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserDetailResource extends Resource
{
    protected static ?string $model = UserDetail::class;

    protected static ?string $pluralLabel ='Informasi Pengguna';

    protected static ?string $navigationGroup = 'Users Management';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\DatePicker::make('date_birth'),

                Forms\Components\TextInput::make('birth_place')
                    ->maxLength(255),

                Forms\Components\Textarea::make('street')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('district')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('city')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('province')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('post_code')
                    ->maxLength(255),

                Forms\Components\Textarea::make('phone_number')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('date_birth')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('birth_place')
                    ->label('Tempat Lahir')
                    ->searchable(),

                Tables\Columns\TextColumn::make('post_code')
                    ->label('Kode Pos')
                    ->searchable(),

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
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make('Informasi Pengguna')
                    ->icon('heroicon-o-plus')

                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Nama Pengguna'),

                        TextEntry::make('birth_place')
                            ->label('Tempat Lahir'),

                        TextEntry::make('date_birth')
                            ->label('Tanggal Lahir'),

                        TextEntry::make('phone_number')
                            ->label('Nomor Handphone'),

                        TextEntry::make('post_code')
                            ->label('Kode Pos'),

                    ])
                    ->collapsible()
                    ->columns(3),

                Section::make('Alamat Pengguna')
                    ->icon('heroicon-o-cog-8-tooth')

                    ->schema([
                        TextEntry::make('street')
                            ->label('Alamat/Jalan'),

                        TextEntry::make('district')
                            ->label('Kecamatan'),

                        TextEntry::make('city')
                            ->label('Kota'),

                        TextEntry::make('province')
                            ->label('Provinsi'),

                        TextEntry::make('post_code')
                            ->label('Kode Pos'),

                    ])
                    ->collapsible()
                    ->columns(3),

            ]);
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserDetails::route('/'),
            'create' => Pages\CreateUserDetail::route('/create'),
//            'view' => Pages\ViewUserDetail::route('/{record}'),
//            'edit' => Pages\EditUserDetail::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserIdentityResource\Pages;
use App\Filament\Resources\UserIdentityResource\RelationManagers;
use App\Models\new_identity;
use App\Models\UserIdentity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class UserIdentityResource extends Resource
{
    protected static ?string $model = UserIdentity::class;

    protected static ?string $pluralLabel = 'Identitas Pengguna';

    protected static ?string $navigationGroup = 'Users Management';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\TextInput::make('identity_number')
                    ->numeric(),

                Forms\Components\Textarea::make('identity_image')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('selfie_image')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                    Tables\Columns\TextColumn::make('user.name')
                            ->icon('heroicon-o-user'),
                    Tables\Columns\TextColumn::make('identity_number'),

                    Tables\Columns\ImageColumn::make('selfie_image')
                        ->size(50),
                    Tables\Columns\ImageColumn::make('identity_image')
                        ->size(50)

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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make('Data Diri Pengguna')
                    ->icon('heroicon-o-plus')

                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Nama Pengguna'),

                        TextEntry::make('identity_number')
                            ->label('Nomor Identitas'),

                        ImageEntry::make('identity_image')
                            ->label('Foto KTP'),

                        ImageEntry::make('selfie_image')
                            ->label('Foto Selfie Dengan KTP'),

                    ])
                    ->collapsible()
                    ->columns(2),

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
            'index' => Pages\ListUserIdentities::route('/'),
            'create' => Pages\CreateUserIdentity::route('/create'),
//            'view' => Pages\ViewUserIdentity::route('/{record}'),
//            'edit' => Pages\EditUserIdentity::route('/{record}/edit'),
        ];
    }
}

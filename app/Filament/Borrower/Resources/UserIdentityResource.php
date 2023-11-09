<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\UserIdentityResource\Pages;
use App\Filament\Borrower\Resources\UserIdentityResource\RelationManagers;
use App\Models\UserIdentity;
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

class UserIdentityResource extends Resource
{
    protected static ?string $model = UserIdentity::class;

    protected static ?string $navigationGroup = 'Data Diri';

    protected static ?string $pluralLabel = 'Identitas Saya';

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('identity_number')
                    ->label('NIK KTP')
                    ->numeric(),

                Forms\Components\FileUpload::make('identity_image')
                    ->label('Foto KTP')
                    ->preserveFilenames()
                    ->image()
                    ->directory('identity_images')
                    ->visibility('private')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('selfie_image')
                    ->label('Foto Selfie + KTP')
                    ->preserveFilenames()
                    ->image()
                    ->directory('selfie_images')
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
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('identity_number')
                    ->label('NIK KTP'),

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
                Section::make('Identitas Saya')
                    ->icon('heroicon-o-building-storefront')
                    ->schema([
                        TextEntry::make('user.name') ->label('Nama'),
                        TextEntry::make('identity_number') ->label('NIK KTP'),
                        ImageEntry::make('selfie_image') ->label('Foto Selfie + KTP'),
                        ImageEntry::make('identity_image') ->label('Foto KTP'),

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

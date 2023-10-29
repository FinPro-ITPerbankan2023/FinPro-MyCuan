<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserIdentityResource\Pages;
use App\Filament\Resources\UserIdentityResource\RelationManagers;
use App\Models\new_identity;
use App\Models\UserIdentity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class UserIdentityResource extends Resource
{
    protected static ?string $model = UserIdentity::class;

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
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('identity_number')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\BulkAction::make('post')
                    ->action(function (Collection $records) {
                        $authenticatedUser = Auth::user();

                        $records->each(function ($record) use ($authenticatedUser) {
                            $dataToInsert = $record->toArray();

                            $dataToInsert['user_id'] = $authenticatedUser->id;

                            new_identity::create($dataToInsert);

                            $record->delete();

                        });
                    })
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
            'index' => Pages\ListUserIdentities::route('/'),
            'create' => Pages\CreateUserIdentity::route('/create'),
            'view' => Pages\ViewUserIdentity::route('/{record}'),
            'edit' => Pages\EditUserIdentity::route('/{record}/edit'),
        ];
    }
}

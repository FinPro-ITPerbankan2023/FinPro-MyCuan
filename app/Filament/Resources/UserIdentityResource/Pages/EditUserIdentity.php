<?php

namespace App\Filament\Resources\UserIdentityResource\Pages;

use App\Filament\Resources\UserIdentityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserIdentity extends EditRecord
{
    protected static string $resource = UserIdentityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

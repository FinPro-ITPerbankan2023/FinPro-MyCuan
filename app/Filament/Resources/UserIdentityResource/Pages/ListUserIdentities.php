<?php

namespace App\Filament\Resources\UserIdentityResource\Pages;

use App\Filament\Resources\UserIdentityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserIdentities extends ListRecords
{
    protected static string $resource = UserIdentityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Borrower\Resources\UserIdentityResource\Pages;

use App\Filament\Borrower\Resources\UserIdentityResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUserIdentity extends ViewRecord
{
    protected static string $resource = UserIdentityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

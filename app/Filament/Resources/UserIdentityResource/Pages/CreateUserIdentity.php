<?php

namespace App\Filament\Resources\UserIdentityResource\Pages;

use App\Filament\Resources\UserIdentityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserIdentity extends CreateRecord
{
    protected static string $resource = UserIdentityResource::class;
}

<?php

namespace App\Filament\Borrower\Resources\UserIdentityResource\Pages;

use App\Filament\Borrower\Resources\UserIdentityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserIdentity extends CreateRecord
{
    protected static string $resource = UserIdentityResource::class;
}

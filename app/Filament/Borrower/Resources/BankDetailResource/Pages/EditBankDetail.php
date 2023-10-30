<?php

namespace App\Filament\Borrower\Resources\BankDetailResource\Pages;

use App\Filament\Borrower\Resources\BankDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankDetail extends EditRecord
{
    protected static string $resource = BankDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

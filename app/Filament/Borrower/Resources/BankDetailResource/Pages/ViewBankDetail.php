<?php

namespace App\Filament\Borrower\Resources\BankDetailResource\Pages;

use App\Filament\Borrower\Resources\BankDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBankDetail extends ViewRecord
{
    protected static string $resource = BankDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

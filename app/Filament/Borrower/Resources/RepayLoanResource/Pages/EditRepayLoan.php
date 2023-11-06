<?php

namespace App\Filament\Borrower\Resources\RepayLoanResource\Pages;

use App\Filament\Borrower\Resources\RepayLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRepayLoan extends EditRecord
{
    protected static string $resource = RepayLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

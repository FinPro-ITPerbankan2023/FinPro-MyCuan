<?php

namespace App\Filament\Resources\PaymentBackLoanResource\Pages;

use App\Filament\Resources\PaymentBackLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentBackLoan extends EditRecord
{
    protected static string $resource = PaymentBackLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

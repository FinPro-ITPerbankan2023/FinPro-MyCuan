<?php

namespace App\Filament\Resources\PaymentBackLoanResource\Pages;

use App\Filament\Resources\PaymentBackLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPaymentBackLoan extends ViewRecord
{
    protected static string $resource = PaymentBackLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

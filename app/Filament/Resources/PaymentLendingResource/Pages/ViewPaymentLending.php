<?php

namespace App\Filament\Resources\PaymentLendingResource\Pages;

use App\Filament\Resources\PaymentLendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPaymentLending extends ViewRecord
{
    protected static string $resource = PaymentLendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

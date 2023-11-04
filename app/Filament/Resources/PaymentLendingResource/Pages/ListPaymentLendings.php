<?php

namespace App\Filament\Resources\PaymentLendingResource\Pages;

use App\Filament\Resources\PaymentLendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentLendings extends ListRecords
{
    protected static string $resource = PaymentLendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

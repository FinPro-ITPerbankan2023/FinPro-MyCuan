<?php

namespace App\Filament\Resources\PaymentLendingResource\Pages;

use App\Filament\Resources\PaymentLendingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentLending extends EditRecord
{
    protected static string $resource = PaymentLendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

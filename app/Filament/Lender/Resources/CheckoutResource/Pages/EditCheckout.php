<?php

namespace App\Filament\Lender\Resources\CheckoutResource\Pages;

use App\Filament\Lender\Resources\CheckoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckout extends EditRecord
{
    protected static string $resource = CheckoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Lender\Resources\HistoryTransactionResource\Pages;

use App\Filament\Lender\Resources\HistoryTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistoryTransaction extends EditRecord
{
    protected static string $resource = HistoryTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

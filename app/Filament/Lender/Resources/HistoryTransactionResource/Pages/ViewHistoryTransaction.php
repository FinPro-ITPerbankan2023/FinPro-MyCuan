<?php

namespace App\Filament\Lender\Resources\HistoryTransactionResource\Pages;

use App\Filament\Lender\Resources\HistoryTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHistoryTransaction extends ViewRecord
{
    protected static string $resource = HistoryTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

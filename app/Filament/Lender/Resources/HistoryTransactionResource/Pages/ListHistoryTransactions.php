<?php

namespace App\Filament\Lender\Resources\HistoryTransactionResource\Pages;

use App\Filament\Lender\Resources\HistoryTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoryTransactions extends ListRecords
{
    protected static string $resource = HistoryTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Borrower\Resources\ApplicationHistoryResource\Pages;

use App\Filament\Borrower\Resources\ApplicationHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApplicationHistories extends ListRecords
{
    protected static string $resource = ApplicationHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

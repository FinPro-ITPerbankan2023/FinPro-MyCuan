<?php

namespace App\Filament\Borrower\Resources\ApplicationHistoryResource\Pages;

use App\Filament\Borrower\Resources\ApplicationHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewApplicationHistory extends ViewRecord
{
    protected static string $resource = ApplicationHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

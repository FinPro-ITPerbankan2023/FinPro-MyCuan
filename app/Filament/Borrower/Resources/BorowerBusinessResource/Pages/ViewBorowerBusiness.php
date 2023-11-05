<?php

namespace App\Filament\Borrower\Resources\BorowerBusinessResource\Pages;

use App\Filament\Borrower\Resources\BorowerBusinessResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBorowerBusiness extends ViewRecord
{
    protected static string $resource = BorowerBusinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Borrower\Resources\ApplicationHistoryResource\Pages;

use App\Filament\Borrower\Resources\ApplicationHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplicationHistory extends EditRecord
{
    protected static string $resource = ApplicationHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

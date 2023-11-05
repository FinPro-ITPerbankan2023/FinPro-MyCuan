<?php

namespace App\Filament\Borrower\Resources\BorowerBusinessResource\Pages;

use App\Filament\Borrower\Resources\BorowerBusinessResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBorowerBusiness extends EditRecord
{
    protected static string $resource = BorowerBusinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\LoanListResource\Pages;

use App\Filament\Resources\LoanListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLoanLists extends ListRecords
{
    protected static string $resource = LoanListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

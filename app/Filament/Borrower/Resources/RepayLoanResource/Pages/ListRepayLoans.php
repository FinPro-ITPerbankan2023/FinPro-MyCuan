<?php

namespace App\Filament\Borrower\Resources\RepayLoanResource\Pages;

use App\Filament\Borrower\Resources\RepayLoanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRepayLoans extends ListRecords
{
    protected static string $resource = RepayLoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

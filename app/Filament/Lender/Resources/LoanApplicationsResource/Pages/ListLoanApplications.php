<?php

namespace App\Filament\Lender\Resources\LoanApplicationsResource\Pages;

use App\Filament\Lender\Resources\LoanApplicationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLoanApplications extends ListRecords
{
    protected static string $resource = LoanApplicationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

        ];
    }
}

<?php

namespace App\Filament\Lender\Resources\LoanApplicationsResource\Pages;

use App\Filament\Lender\Resources\LoanApplicationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLoanApplications extends ViewRecord
{
    protected static string $resource = LoanApplicationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Lender\Resources\LoanApplicationsResource\Pages;

use App\Filament\Lender\Resources\LoanApplicationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLoanApplications extends EditRecord
{
    protected static string $resource = LoanApplicationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

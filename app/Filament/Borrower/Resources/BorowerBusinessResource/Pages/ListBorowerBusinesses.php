<?php

namespace App\Filament\Borrower\Resources\BorowerBusinessResource\Pages;

use App\Filament\Borrower\Resources\BorowerBusinessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBorowerBusinesses extends ListRecords
{
    protected static string $resource = BorowerBusinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Usaha Baru')

        ];
    }
}

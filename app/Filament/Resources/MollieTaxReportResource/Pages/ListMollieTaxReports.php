<?php

namespace App\Filament\Resources\MollieTaxReportResource\Pages;

use App\Filament\Resources\MollieTaxReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMollieTaxReports extends ListRecords
{
    protected static string $resource = MollieTaxReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

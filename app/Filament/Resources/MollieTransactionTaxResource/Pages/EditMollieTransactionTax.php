<?php

namespace App\Filament\Resources\MollieTransactionTaxResource\Pages;

use App\Filament\Resources\MollieTransactionTaxResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMollieTransactionTax extends EditRecord
{
    protected static string $resource = MollieTransactionTaxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

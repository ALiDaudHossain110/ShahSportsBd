<?php

namespace App\Filament\Resources\ProductgenreResource\Pages;

use App\Filament\Resources\ProductgenreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductgenre extends EditRecord
{
    protected static string $resource = ProductgenreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

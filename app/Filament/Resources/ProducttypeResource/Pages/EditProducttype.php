<?php

namespace App\Filament\Resources\ProducttypeResource\Pages;

use App\Filament\Resources\ProducttypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducttype extends EditRecord
{
    protected static string $resource = ProducttypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

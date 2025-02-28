<?php

namespace App\Filament\Resources\ProducttypeResource\Pages;

use App\Filament\Resources\ProducttypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducttypes extends ListRecords
{
    protected static string $resource = ProducttypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

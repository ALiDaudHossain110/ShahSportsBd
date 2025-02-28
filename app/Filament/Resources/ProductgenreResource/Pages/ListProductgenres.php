<?php

namespace App\Filament\Resources\ProductgenreResource\Pages;

use App\Filament\Resources\ProductgenreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductgenres extends ListRecords
{
    protected static string $resource = ProductgenreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

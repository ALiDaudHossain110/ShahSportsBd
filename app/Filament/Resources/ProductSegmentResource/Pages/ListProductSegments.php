<?php

namespace App\Filament\Resources\ProductSegmentResource\Pages;

use App\Filament\Resources\ProductSegmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductSegments extends ListRecords
{
    protected static string $resource = ProductSegmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

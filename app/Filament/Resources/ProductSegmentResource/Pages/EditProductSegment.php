<?php

namespace App\Filament\Resources\ProductSegmentResource\Pages;

use App\Filament\Resources\ProductSegmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductSegment extends EditRecord
{
    protected static string $resource = ProductSegmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

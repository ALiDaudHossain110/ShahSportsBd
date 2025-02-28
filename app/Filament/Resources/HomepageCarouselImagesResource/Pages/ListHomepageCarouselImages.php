<?php

namespace App\Filament\Resources\HomepageCarouselImagesResource\Pages;

use App\Filament\Resources\HomepageCarouselImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomepageCarouselImages extends ListRecords
{
    protected static string $resource = HomepageCarouselImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

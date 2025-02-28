<?php

namespace App\Filament\Resources\HomepageCarouselImagesResource\Pages;

use App\Filament\Resources\HomepageCarouselImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomepageCarouselImages extends EditRecord
{
    protected static string $resource = HomepageCarouselImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

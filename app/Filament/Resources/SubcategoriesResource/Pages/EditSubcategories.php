<?php

namespace App\Filament\Resources\SubcategoriesResource\Pages;

use App\Filament\Resources\SubcategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubcategories extends EditRecord
{
    protected static string $resource = SubcategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\OurClientsResource\Pages;

use App\Filament\Resources\OurClientsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurClients extends EditRecord
{
    protected static string $resource = OurClientsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

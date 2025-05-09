<?php

namespace App\Filament\Resources\MakananKhasResource\Pages;

use App\Filament\Resources\MakananKhasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMakananKhas extends ListRecords
{
    protected static string $resource = MakananKhasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

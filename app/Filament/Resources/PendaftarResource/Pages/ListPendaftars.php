<?php

namespace App\Filament\Resources\PendaftarResource\Pages;

use App\Filament\Resources\PendaftarResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPendaftars extends ListRecords
{
    protected static string $resource = PendaftarResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

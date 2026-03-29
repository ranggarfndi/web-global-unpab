<?php

namespace App\Filament\Resources\ArchivedProgramResource\Pages;

use App\Filament\Resources\ArchivedProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArchivedPrograms extends ListRecords
{
    protected static string $resource = ArchivedProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

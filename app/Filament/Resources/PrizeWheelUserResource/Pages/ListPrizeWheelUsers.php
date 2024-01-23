<?php

namespace App\Filament\Resources\PrizeWheelUserResource\Pages;

use App\Filament\Resources\PrizeWheelUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrizeWheelUsers extends ListRecords
{
    protected static string $resource = PrizeWheelUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

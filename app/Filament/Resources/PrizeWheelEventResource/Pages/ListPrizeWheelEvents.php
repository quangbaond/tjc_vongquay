<?php

namespace App\Filament\Resources\PrizeWheelEventResource\Pages;

use App\Filament\Resources\PrizeWheelEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrizeWheelEvents extends ListRecords
{
    protected static string $resource = PrizeWheelEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

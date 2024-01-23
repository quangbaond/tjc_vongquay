<?php

namespace App\Filament\Resources\PrizeWheelResource\Pages;

use App\Filament\Resources\PrizeWheelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrizeWheels extends ListRecords
{
    protected static string $resource = PrizeWheelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

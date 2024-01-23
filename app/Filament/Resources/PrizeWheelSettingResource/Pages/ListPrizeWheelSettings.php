<?php

namespace App\Filament\Resources\PrizeWheelSettingResource\Pages;

use App\Filament\Resources\PrizeWheelSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrizeWheelSettings extends ListRecords
{
    protected static string $resource = PrizeWheelSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

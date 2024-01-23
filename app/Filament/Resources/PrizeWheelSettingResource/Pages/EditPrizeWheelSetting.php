<?php

namespace App\Filament\Resources\PrizeWheelSettingResource\Pages;

use App\Filament\Resources\PrizeWheelSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrizeWheelSetting extends EditRecord
{
    protected static string $resource = PrizeWheelSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

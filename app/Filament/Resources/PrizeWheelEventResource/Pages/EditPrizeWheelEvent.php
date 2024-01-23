<?php

namespace App\Filament\Resources\PrizeWheelEventResource\Pages;

use App\Filament\Resources\PrizeWheelEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrizeWheelEvent extends EditRecord
{
    protected static string $resource = PrizeWheelEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PrizeWheelUserResource\Pages;

use App\Filament\Resources\PrizeWheelUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrizeWheelUser extends EditRecord
{
    protected static string $resource = PrizeWheelUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PrizeWheelEventResource\Pages;

use App\Filament\Resources\PrizeWheelEventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePrizeWheelEvent extends CreateRecord
{
    protected static string $resource = PrizeWheelEventResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['name']);

        return $data;
    }
}

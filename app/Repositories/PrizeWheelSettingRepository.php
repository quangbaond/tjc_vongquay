<?php

namespace App\Repositories;

class PrizeWheelSettingRepository extends Eloquent\BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return \App\Models\PrizeWheelSetting::class;
    }
}

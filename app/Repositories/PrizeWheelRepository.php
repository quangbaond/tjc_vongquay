<?php

namespace App\Repositories;

class PrizeWheelRepository extends Eloquent\BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return \App\Models\PrizeWheel::class;
    }
}

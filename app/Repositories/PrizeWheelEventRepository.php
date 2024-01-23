<?php

namespace App\Repositories;

class PrizeWheelEventRepository extends Eloquent\BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return \App\Models\PrizeWheelEvent::class;
    }
}

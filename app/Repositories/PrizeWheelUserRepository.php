<?php

namespace App\Repositories;

class PrizeWheelUserRepository extends Eloquent\BaseRepository
{

    /**
     * @inheritDoc
     */
    public function model(): string
    {
        return \App\Models\PrizeWheelUser::class;
    }
}

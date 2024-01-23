<?php

namespace App\Services;

use App\Repositories\PrizeWheelRepository;
use App\Services\BaseService;

class PrizeWheelService extends BaseService
{
    protected PrizeWheelRepository $prizeWheelRepository;

    /**
     * @param PrizeWheelRepository $prizeWheelRepository
     */
    public function __construct(PrizeWheelRepository $prizeWheelRepository)    {
        parent::__construct($prizeWheelRepository);
        $this->prizeWheelRepository = $prizeWheelRepository;
    }
}

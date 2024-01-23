<?php

namespace App\Services;

use App\Repositories\PrizeWheelEventRepository;
use App\Services\BaseService;

class PrizeWheelEventService extends BaseService
{
    protected PrizeWheelEventRepository $prizeWheelEventRepository;

    /**
     * @param PrizeWheelEventRepository $prizeWheelEventRepository
     */
    public function __construct(PrizeWheelEventRepository $prizeWheelEventRepository)
    {
        parent::__construct($prizeWheelEventRepository);
        $this->prizeWheelEventRepository = $prizeWheelEventRepository;
    }
}

<?php

namespace App\Services;

use App\Repositories\PrizeWheelSettingRepository;
use App\Services\BaseService;

class PrizeWheelSettingService extends BaseService
{
    protected PrizeWheelSettingRepository $prizeWheelSettingRepository;

    /**
     * @param PrizeWheelSettingRepository $prizeWheelSettingRepository
     */
    public function __construct(PrizeWheelSettingRepository $prizeWheelSettingRepository)
    {
        parent::__construct($prizeWheelSettingRepository);
        $this->prizeWheelSettingRepository = $prizeWheelSettingRepository;
    }

}

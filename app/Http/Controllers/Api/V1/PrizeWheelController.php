<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Services\PrizeWheelEventService;
use App\Services\PrizeWheelService;
use App\Services\PrizeWheelSettingService;
use App\Services\PrizeWheelUserService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrizeWheelController extends ApiController
{
    protected PrizeWheelService $prizeWheelService;

    protected PrizeWheelUserService $prizeWheelUserService;

    protected PrizeWheelSettingService $prizeWheelSettingService;

    protected PrizeWheelEventService $prizeWheelEventService;


    /**
     * @param PrizeWheelService $prizeWheelService
     * @param PrizeWheelUserService $prizeWheelUserService
     * @param PrizeWheelSettingService $prizeWheelSettingService
     * @param PrizeWheelEventService $prizeWheelEventService
     */
    public function __construct(
        PrizeWheelService        $prizeWheelService,
        PrizeWheelUserService    $prizeWheelUserService,
        PrizeWheelSettingService $prizeWheelSettingService,
        PrizeWheelEventService   $prizeWheelEventService
    ) {
        $this->prizeWheelService = $prizeWheelService;
        $this->prizeWheelUserService = $prizeWheelUserService;
        $this->prizeWheelSettingService = $prizeWheelSettingService;
        $this->prizeWheelEventService = $prizeWheelEventService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return $this->sendSuccess(
            $this->prizeWheelService->all(),
            'Prize Wheels retrieved successfully.',
            Response::HTTP_OK
        );
    }

    /**
     * @param $phone
     * @return JsonResponse
     */
    public function checkUser($phone): JsonResponse
    {
        $user = $this->prizeWheelUserService->checkUser($phone);
        return $this->sendSuccess(
            $user,
            $user > 0 ? 'User retrieved successfully.' : 'User not found.',
            $user > 0 ? Response::HTTP_OK : Response::HTTP_NOT_FOUND
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function store(Request $request): JsonResponse
    {
        $prizeWheel = $this->prizeWheelUserService->create($request->all());

        return $this->sendSuccess(
            [
                'prize_wheel' => $prizeWheel,
            ],
            'Prize Wheel saved successfully.',
            Response::HTTP_CREATED
        );
    }

    /**
     * @param $slug
     * @return JsonResponse
     */
    public function getEvent($slug): JsonResponse
    {
        $event = $this->prizeWheelEventService->findBySlug($slug, ['setting']);
        return $this->sendSuccess(
            $event,
            $event ? 'Setting retrieved successfully.' : 'Setting not found.',
            $event ? Response::HTTP_OK : Response::HTTP_NOT_FOUND
        );
    }
}

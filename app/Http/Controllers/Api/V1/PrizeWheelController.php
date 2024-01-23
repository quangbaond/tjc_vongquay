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

    public function getUser(Request $request)
    {
        if ($request->has('event_id') && $request->get('event_id')) {
            $query = $this->prizeWheelUserService->search([
                'keyword' => $request->has('search') && $request->get('search')['value'] ? $request->get('search')['value'] : null,
                'event_id' => $request->get('event_id'),
                'orderByColumn' => 'created_at',
                'orderBy' => 'desc',
            ], ['phone']);
            $pageNumber = ($request->start / $request->length) + 1;
            $pageLength = $request->length;
            $skip       = ($pageNumber - 1) * $pageLength;

            $recordsFiltered = $recordsTotal = $query->count();

            $users = $query->skip($skip)->take($pageLength)->get();

            return response()->json(["draw" => $request->draw, "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $users], 200);

        }

        $user = $this->prizeWheelUserService->all();

        return $this->sendSuccess(
            $user,
            'User retrieved successfully.',
            Response::HTTP_OK
        );
    }

    // tính tỉ lệ trúng thưởng của từng giải

    /**
     * @param $event_id
     * @return JsonResponse
     */
    public function getPrize($event_id): JsonResponse
    {
        $prizes = $this->prizeWheelService->first(['event_id' => $event_id]);

        // tính tỉ lệ trúng thưởng của từng giải
        // tổng số lượt quay
        $total = $this->prizeWheelUserService->count(['event_id' => $event_id]);
        $prizes->map(function ($prize) use ($total) {
            $prize->probability = round($prize->probability / $total * 100, 2);
            return $prize;
        });

       // trả về giải thưởng có tỉ lệ trúng thấp nhất
        $prize = $prizes->sortBy('probability')->first();

        return $this->sendSuccess(
            $prize,
            $prize ? 'Prize retrieved successfully.' : 'Prize not found.',
            $prize ? Response::HTTP_OK : Response::HTTP_NOT_FOUND
        );
    }
}

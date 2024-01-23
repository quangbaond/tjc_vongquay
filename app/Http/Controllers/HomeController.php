<?php

namespace App\Http\Controllers;

use App\Services\PrizeWheelEventService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
{

    protected PrizeWheelEventService $prizeWheelEventService;
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }

    public function __construct(PrizeWheelEventService $prizeWheelEventService)
    {
        $this->prizeWheelEventService = $prizeWheelEventService;
    }

    /**
     * @param $slug
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function event($slug): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $agent = new Agent;

        $event = $this->prizeWheelEventService->findBySlug($slug, ['setting', 'prizes', 'users']);

        $mobileResult = $agent->isMobile();

        if ($mobileResult) {
            return view('mobile.event-mobile', compact('event'));
        } else {
            return view('event', compact('event'));
        }

        // return view('event', compact('event'));
    }
}

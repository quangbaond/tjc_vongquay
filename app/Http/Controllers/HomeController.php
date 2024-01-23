<?php

namespace App\Http\Controllers;

use App\Services\PrizeWheelEventService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

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
        $event = $this->prizeWheelEventService->findBySlug($slug, ['setting']);

        return view('event', compact('event'));

    }
}

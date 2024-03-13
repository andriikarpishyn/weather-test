<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Contracts\View\View;

class WeatherController extends Controller
{
    public function __construct(
        protected WeatherService $weatherService
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function index(): View
    {
        $data = $this->weatherService->getWeatherForUser();
        return view('web.weather.index', $data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Cache;

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
    public function index()
    {
        $cached = Cache::has(auth()->id().'_user_weather');
        $data = $this->weatherService->getWeatherForUser();

        return response()->json(compact('cached') + $data);
    }
}

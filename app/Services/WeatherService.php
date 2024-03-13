<?php

namespace App\Services;

use App\DTO\CoordinateData;
use App\DTO\WeatherData;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class WeatherService
{

    /**
     * @throws \Exception
     */
    public static function getInfoFromCoordinate(CoordinateData $coordinate): WeatherData
    {
        $link = env('OPENWEATHER_LINK');
        $apiKey = env('OPENWEATHER_API_KEY');

        $response = Http::get("$link?lat=$coordinate->latitude&lon=$coordinate->longitude&appid=$apiKey");

        if ($response->status() === Response::HTTP_OK) {
            $result = json_decode($response->body());
            return new WeatherData(
                $result->main->temp,
                $result->main->pressure,
                $result->main->humidity,
                $result->main->temp_min,
                $result->main->temp_max,
            );
        } else {
            throw new \Exception($response->status());
        }
    }

    public function getWeatherForUser(): array
    {
        $coordinate = CoordinatesService::getFromClientIp();

        return Cache::remember($coordinate->cityName . '_user_weather', 10 * 60, function () use ($coordinate) {
            $weather = WeatherService::getInfoFromCoordinate($coordinate);
            $user = UserResource::make(auth()->user());
            return compact('user', 'weather');
        });
    }
}

<?php

namespace App\Services;

use App\DTO\CoordinateData;
use Stevebauman\Location\Facades\Location;

class CoordinatesService
{
    public static function getFromClientIp(): CoordinateData
    {
        $location = Location::get();
        return new CoordinateData($location->latitude, $location->longitude, $location->cityName);
    }
}

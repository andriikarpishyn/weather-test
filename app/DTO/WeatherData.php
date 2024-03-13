<?php

namespace App\DTO;

readonly class WeatherData
{
    public function __construct(
        public float $temp,
        public float $pressure,
        public float $humidity,
        public float $temp_min,
        public float $temp_max,
    )
    {
    }
}

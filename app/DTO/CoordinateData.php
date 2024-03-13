<?php

namespace App\DTO;

readonly class CoordinateData
{
    public function __construct(
        public float $latitude,
        public float $longitude,
        public string $cityName
    )
    {
    }
}

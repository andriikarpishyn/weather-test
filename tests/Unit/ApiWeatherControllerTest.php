<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\WeatherController;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ApiWeatherControllerTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;
    protected string $basicRoute = '/api/home';
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGetWeatherUnauthenticated(): void
    {

    }
}

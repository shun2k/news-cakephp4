<?php

namespace App\Test\TestCase\Model\GetInfo;

use Cake\Http\TestSuite\HttpClientTrait;
use App\Model\GetInfo\WeatherMain;
use Cake\TestSuite\TestCase;

class WeatherMainTest extends TestCase {

    use HttpClientTrait;

    protected $WeatherData;

    public function setUp():void
    {
        parent::setUp();
        $this->WeatherData = new WeatherMain(env("OPENWEATHER_ONEDAY_URL"), env("OPENWEATHER_KEY"), "Tokyo");
    }

    public function test_WeatherMain(): void
    {
        $response = $this->WeatherData->getApiData();
        $this->assertNotEmpty($response);
        $this->assertIsArray($response);
        $this->assertContains('Tokyo', $response);
    }











}
<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\WeatherIconsHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\WeatherIconsHelper Test Case
 */
class WeatherIconsHelperTest extends TestCase
{
    protected $WeatherIcons;

    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->WeatherIcons = new WeatherIconsHelper($view);
    }

    protected function tearDown(): void
    {
        unset($this->WeatherIcons);

        parent::tearDown();
    }

    public function test_Icons(): void
    {
        $picture = $this->WeatherIcons->changePicture("320");
        $this->assertEquals("drizzle", $picture);
    }
}

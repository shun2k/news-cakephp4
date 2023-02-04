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
    /**
     * Test subject
     *
     * @var \App\View\Helper\WeatherIconsHelper
     */
    protected $WeatherIcons;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->WeatherIcons = new WeatherIconsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WeatherIcons);

        parent::tearDown();
    }
}

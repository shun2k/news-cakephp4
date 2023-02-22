<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\NewsHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\NewsHelper Test Case
 */
class NewsHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\NewsHelper
     */
    protected $News;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->News = new NewsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->News);

        parent::tearDown();
    }

    public function testNewsHelper(): void 
    {
        $nameChecker = $this->News->changeCategories('business');
        $this->assertEquals('ビジネス', $nameChecker);

    }
}

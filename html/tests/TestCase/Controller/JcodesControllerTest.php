<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\JcodesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\TestSuite\Fixture\FixtureStrategyInterface;
use Cake\TestSuite\Fixture\TransactionStrategy;

/**
 * App\Controller\JcodesController Test Case
 *
 * @uses \App\Controller\JcodesController
 */
class JcodesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Jcodes',
    ];

    protected function getFixtureStrategy(): FixtureStrategyInterface
    {
        return new TransactionStrategy();
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\JcodesController::index()
     */
    public function testIndex(): void
    {
        $this->get('/jcodes/index');
        $this->assertResponseSuccess();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\JcodesController::view()
     */
    public function testView(): void
    {
        $this->get('/jcodes/view');
        $this->assertResponseSuccess();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\JcodesController::add()
     */
    public function testAdd(): void
    {
        $this->get('/jcodes/add');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\JcodesController::edit()
     */
    public function testEdit(): void
    {
        $this->get('/jcodes/edit');
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\JcodesController::delete()
     */
    public function testDelete(): void
    {
        $this->get('/jcodes/delete');
        $this->assertResponseSuccess();
    }
}

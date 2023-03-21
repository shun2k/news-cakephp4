<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\NewsUsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\TestSuite\Fixture\FixtureStrategyInterface;
use Cake\TestSuite\Fixture\TransactionStrategy;
use Cake\ORM\TableRegistry;

session_start();    // IntegrationTestTraitのsessionを利用するため
/**
 * App\Controller\NewsUsersController Test Case
 *
 * @uses \App\Controller\NewsUsersController
 */
class NewsUsersControllerTest extends TestCase
{
    use IntegrationTestTrait;
    

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.NewsUsers', 'app.Jcodes'
    ];

    protected function getFixtureStrategy(): FixtureStrategyInterface
    {
        return new TransactionStrategy();
    }

    protected function login($userId = 5)
    {
        
        // $this->enableCsrfToken();
        // $this->enableSecurityToken();
        // $this->post('news_users/login',
        // [
        //     'email' => 'hanada@ii.com',
        //     'password' => '$2y$10$vmmJqTYY9M3V6ZMd5BLps.5LlSl5ZrxFe0EzNtU0OjeYMctBv22YS',
        // ]);
        // $session = $this->request->getSession();
        $users = TableRegistry::getTableLocator()->get('NewsUsers');
        $user = $users->get($userId);
        $this->session(['Auth' => $user]);
        // var_dump($this->getSession());
        
        
        
        // $this->assertSession(5, 'Auth.id');
        // $this->assertSession(5, $_SESSION['Auth']->id);
        // $this->get('/news-users/main');
        // $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\NewsUsersController::index()
     */
    public function testIndex(): void
    {
        // $this->enableCsrfToken();
        // $this->enableSecurityToken();
        $this->login();
        // $this->assertSession(5, 'Auth.id');
        // var_dump($this->getSession());
        // $this->enableCsrfToken();
        // $this->enableSecurityToken();
        // $Jcodes = TableRegistry::getTableLocator()->get('Jcodes');
        // $entityData = $Jcodes->get("1");
        // var_dump($entityData['json']);
        $this->get('/news-users/index/5');
        $this->assertResponseOk();
        
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\NewsUsersController::add()
     */
    public function testAdd(): void
    {
        $this->get('/news-users/add');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\NewsUsersController::edit()
     */
    public function testEdit(): void
    {
        $this->login();
        $this->get('/news-users/edit/5');
        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\NewsUsersController::delete()
     */
    public function testDelete(): void
    {
        $this->login();
        $this->get('/news-users/delete/5');

        $users = TableRegistry::getTableLocator()->get('NewsUsers');
        $user = $users->find('all')->all()->last();

        $this->assertNotEquals("5", $user['id']);
    }

    public function testMain(): void
    {
        $this->get('/news-users/main');
        $this->assertResponseOk();
    }

    public function testNewslist(): void
    {
        $this->get('/news-users/newslist/business');
        $this->assertResponseOk();
    }

    public function testWeatherDetail(): void
    {
        $this->get('/news-users/weather-detail/Tokyo');
        $this->assertResponseOk();
    }
}

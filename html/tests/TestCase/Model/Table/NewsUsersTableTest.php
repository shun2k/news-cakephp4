<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsUsersTable;
use Cake\TestSuite\TestCase;
use Cake\TestSuite\Fixture\FixtureStrategyInterface;
use Cake\TestSuite\Fixture\TransactionStrategy;

/**
 * App\Model\Table\NewsUsersTable Test Case
 */
class NewsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsUsersTable
     */
    protected $NewsUsers;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.NewsUsers',
    ];

    /**
     * Create the fixtures strategy used for this test case.
     * You can use a base class/trait to change multiple classes.
     */
    protected function getFixtureStrategy(): FixtureStrategyInterface
    {
        return new TransactionStrategy();
    }

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('NewsUsers') ? [] : ['className' => NewsUsersTable::class];
        $this->NewsUsers = $this->getTableLocator()->get('NewsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->NewsUsers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NewsUsersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $restul = $this->NewsUsers->get('1');
        $this->assertEquals('Akagi', $restul['name']);
        $query = $this->NewsUsers->find('all',[
            'fields' => ['id', 'name', 'prefecture', 'local', 'column_order', 'email']
        ]);
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->enableHydration(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'name' => 'Akagi',
                'prefecture' => 'Hokkaido',
                'local' => 'Sapporo',
                'column_order' => '654321',
                'email' => 'akagi@gmail.com',
            ],
            [
                'id' => 2,
                'name' => 'Kawai',
                'prefecture' => 'Tokyo',
                'local' => 'Shinagawa-ku',
                'column_order' => '32147',
                'email' => 'kawai@gmail.com',
            ],
            [
                'id' => 3,
                'name' => 'Sato',
                'prefecture' => 'Osaka-fu',
                'local' => 'Osaka-shi',
                'column_order' => '13625',
                'email' => 'Sato@gmail.com',
            ],
            [
                'id' => 4,
                'name' => 'Kato',
                'prefecture' => 'Kyoto',
                'local' => 'Kyoto',
                'column_order' => '1362',
                'email' => 'kato@gmail.com',                
            ],
            [
                'id' => 5,
                'name' => '花田',
                'prefecture' => 'Okinawa-ken',
                'local' => 'Naha',
                'column_order' => '2168',
                'email' => 'hanada@ii.com',
            ]
        ];
        $this->assertEquals($expected, $result);
    }
}

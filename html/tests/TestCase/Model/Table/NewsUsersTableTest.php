<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsUsersTable;
use Cake\TestSuite\TestCase;

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
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JcodesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JcodesTable Test Case
 */
class JcodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JcodesTable
     */
    protected $Jcodes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Jcodes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Jcodes') ? [] : ['className' => JcodesTable::class];
        $this->Jcodes = $this->getTableLocator()->get('Jcodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Jcodes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JcodesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

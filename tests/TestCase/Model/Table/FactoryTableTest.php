<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FactoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FactoryTable Test Case
 */
class FactoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FactoryTable
     */
    public $Factory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.factory',
        'app.person',
        'app.person_factory'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Factory') ? [] : ['className' => FactoryTable::class];
        $this->Factory = TableRegistry::get('Factory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Factory);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

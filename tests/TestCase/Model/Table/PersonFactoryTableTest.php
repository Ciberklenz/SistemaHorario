<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonFactoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonFactoryTable Test Case
 */
class PersonFactoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonFactoryTable
     */
    public $PersonFactory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('PersonFactory') ? [] : ['className' => PersonFactoryTable::class];
        $this->PersonFactory = TableRegistry::get('PersonFactory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonFactory);

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

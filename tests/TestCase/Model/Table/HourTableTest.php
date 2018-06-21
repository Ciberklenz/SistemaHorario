<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HourTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HourTable Test Case
 */
class HourTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HourTable
     */
    public $Hour;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hour'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Hour') ? [] : ['className' => HourTable::class];
        $this->Hour = TableRegistry::get('Hour', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hour);

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

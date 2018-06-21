<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HistoryHourTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HistoryHourTable Test Case
 */
class HistoryHourTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HistoryHourTable
     */
    public $HistoryHour;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.history_hour'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HistoryHour') ? [] : ['className' => HistoryHourTable::class];
        $this->HistoryHour = TableRegistry::get('HistoryHour', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HistoryHour);

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

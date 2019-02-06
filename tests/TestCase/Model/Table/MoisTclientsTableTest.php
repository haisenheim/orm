<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoisTclientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoisTclientsTable Test Case
 */
class MoisTclientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MoisTclientsTable
     */
    public $MoisTclients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mois_tclients',
        'app.mois',
        'app.sectors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MoisTclients') ? [] : ['className' => MoisTclientsTable::class];
        $this->MoisTclients = TableRegistry::getTableLocator()->get('MoisTclients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MoisTclients);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

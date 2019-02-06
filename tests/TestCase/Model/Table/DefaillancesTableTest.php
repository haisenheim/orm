<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefaillancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefaillancesTable Test Case
 */
class DefaillancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DefaillancesTable
     */
    public $Defaillances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.defaillances',
        'app.risques',
        'app.causes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Defaillances') ? [] : ['className' => DefaillancesTable::class];
        $this->Defaillances = TableRegistry::getTableLocator()->get('Defaillances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Defaillances);

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

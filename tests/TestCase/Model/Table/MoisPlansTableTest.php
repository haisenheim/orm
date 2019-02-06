<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoisPlansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoisPlansTable Test Case
 */
class MoisPlansTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MoisPlansTable
     */
    public $MoisPlans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mois_plans',
        'app.mois',
        'app.plans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MoisPlans') ? [] : ['className' => MoisPlansTable::class];
        $this->MoisPlans = TableRegistry::getTableLocator()->get('MoisPlans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MoisPlans);

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

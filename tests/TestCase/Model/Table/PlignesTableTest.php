<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlignesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlignesTable Test Case
 */
class PlignesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlignesTable
     */
    public $Plignes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.plignes',
        'app.plans',
        'app.prs',
        'app.pilotes',
        'app.contributeurs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Plignes') ? [] : ['className' => PlignesTable::class];
        $this->Plignes = TableRegistry::getTableLocator()->get('Plignes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Plignes);

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

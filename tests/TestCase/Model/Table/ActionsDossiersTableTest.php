<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActionsDossiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActionsDossiersTable Test Case
 */
class ActionsDossiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActionsDossiersTable
     */
    public $ActionsDossiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.actions_dossiers',
        'app.actions',
        'app.dossiers',
        'app.responsables'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ActionsDossiers') ? [] : ['className' => ActionsDossiersTable::class];
        $this->ActionsDossiers = TableRegistry::getTableLocator()->get('ActionsDossiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActionsDossiers);

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

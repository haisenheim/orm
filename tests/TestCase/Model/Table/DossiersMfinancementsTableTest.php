<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DossiersMfinancementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DossiersMfinancementsTable Test Case
 */
class DossiersMfinancementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DossiersMfinancementsTable
     */
    public $DossiersMfinancements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dossiers_mfinancements',
        'app.dossiers',
        'app.mfinancements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DossiersMfinancements') ? [] : ['className' => DossiersMfinancementsTable::class];
        $this->DossiersMfinancements = TableRegistry::getTableLocator()->get('DossiersMfinancements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DossiersMfinancements);

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

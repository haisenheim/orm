<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DossiersTimmobilisationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DossiersTimmobilisationsTable Test Case
 */
class DossiersTimmobilisationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DossiersTimmobilisationsTable
     */
    public $DossiersTimmobilisations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dossiers_timmobilisations',
        'app.dossiers',
        'app.timmobilisations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DossiersTimmobilisations') ? [] : ['className' => DossiersTimmobilisationsTable::class];
        $this->DossiersTimmobilisations = TableRegistry::getTableLocator()->get('DossiersTimmobilisations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DossiersTimmobilisations);

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

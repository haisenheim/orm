<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DossiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DossiersTable Test Case
 */
class DossiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DossiersTable
     */
    public $Dossiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dossiers',
        'app.owners',
        'app.marketers',
        'app.autors',
        'app.produits',
        'app.timmobilisations',
        'app.mfinancements',
        'app.answers',
        'app.actions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dossiers') ? [] : ['className' => DossiersTable::class];
        $this->Dossiers = TableRegistry::getTableLocator()->get('Dossiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dossiers);

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

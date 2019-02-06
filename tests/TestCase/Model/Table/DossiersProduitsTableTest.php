<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DossiersProduitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DossiersProduitsTable Test Case
 */
class DossiersProduitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DossiersProduitsTable
     */
    public $DossiersProduits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dossiers_produits',
        'app.dossiers',
        'app.produits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DossiersProduits') ? [] : ['className' => DossiersProduitsTable::class];
        $this->DossiersProduits = TableRegistry::getTableLocator()->get('DossiersProduits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DossiersProduits);

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

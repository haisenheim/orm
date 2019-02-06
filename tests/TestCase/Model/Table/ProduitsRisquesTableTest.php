<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProduitsRisquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProduitsRisquesTable Test Case
 */
class ProduitsRisquesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProduitsRisquesTable
     */
    public $ProduitsRisques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produits_risques',
        'app.produits',
        'app.risques'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProduitsRisques') ? [] : ['className' => ProduitsRisquesTable::class];
        $this->ProduitsRisques = TableRegistry::getTableLocator()->get('ProduitsRisques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProduitsRisques);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimmobilisationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimmobilisationsTable Test Case
 */
class TimmobilisationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimmobilisationsTable
     */
    public $Timmobilisations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.timmobilisations',
        'app.dossiers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Timmobilisations') ? [] : ['className' => TimmobilisationsTable::class];
        $this->Timmobilisations = TableRegistry::getTableLocator()->get('Timmobilisations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Timmobilisations);

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
}

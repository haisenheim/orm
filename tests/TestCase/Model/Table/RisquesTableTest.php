<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RisquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RisquesTable Test Case
 */
class RisquesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RisquesTable
     */
    public $Risques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.risques',
        'app.actions',
        'app.defaillances',
        'app.questions',
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
        $config = TableRegistry::getTableLocator()->exists('Risques') ? [] : ['className' => RisquesTable::class];
        $this->Risques = TableRegistry::getTableLocator()->get('Risques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Risques);

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

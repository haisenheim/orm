<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectorsTable Test Case
 */
class SectorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SectorsTable
     */
    public $Sectors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sectors',
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
        $config = TableRegistry::getTableLocator()->exists('Sectors') ? [] : ['className' => SectorsTable::class];
        $this->Sectors = TableRegistry::getTableLocator()->get('Sectors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sectors);

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

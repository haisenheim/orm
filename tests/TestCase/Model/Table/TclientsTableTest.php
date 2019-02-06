<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TclientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TclientsTable Test Case
 */
class TclientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TclientsTable
     */
    public $Tclients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tclients',
        'app.clients',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Tclients') ? [] : ['className' => TclientsTable::class];
        $this->Tclients = TableRegistry::getTableLocator()->get('Tclients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tclients);

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

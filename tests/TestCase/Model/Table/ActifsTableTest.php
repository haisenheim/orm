<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActifsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActifsTable Test Case
 */
class ActifsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActifsTable
     */
    public $Actifs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.actifs',
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
        $config = TableRegistry::getTableLocator()->exists('Actifs') ? [] : ['className' => ActifsTable::class];
        $this->Actifs = TableRegistry::getTableLocator()->get('Actifs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Actifs);

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

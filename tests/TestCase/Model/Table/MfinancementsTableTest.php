<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MfinancementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MfinancementsTable Test Case
 */
class MfinancementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MfinancementsTable
     */
    public $Mfinancements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mfinancements',
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
        $config = TableRegistry::getTableLocator()->exists('Mfinancements') ? [] : ['className' => MfinancementsTable::class];
        $this->Mfinancements = TableRegistry::getTableLocator()->get('Mfinancements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mfinancements);

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

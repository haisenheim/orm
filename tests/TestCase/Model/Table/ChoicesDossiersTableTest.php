<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChoicesDossiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChoicesDossiersTable Test Case
 */
class ChoicesDossiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChoicesDossiersTable
     */
    public $ChoicesDossiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.choices_dossiers',
        'app.choices',
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
        $config = TableRegistry::getTableLocator()->exists('ChoicesDossiers') ? [] : ['className' => ChoicesDossiersTable::class];
        $this->ChoicesDossiers = TableRegistry::getTableLocator()->get('ChoicesDossiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChoicesDossiers);

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

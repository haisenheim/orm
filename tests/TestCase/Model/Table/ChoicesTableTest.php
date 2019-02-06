<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChoicesTable Test Case
 */
class ChoicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChoicesTable
     */
    public $Choices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.choices',
        'app.questions',
        'app.answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Choices') ? [] : ['className' => ChoicesTable::class];
        $this->Choices = TableRegistry::getTableLocator()->get('Choices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Choices);

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

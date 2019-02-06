<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoisSectorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoisSectorsTable Test Case
 */
class MoisSectorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MoisSectorsTable
     */
    public $MoisSectors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mois_sectors',
        'app.mois',
        'app.sectors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MoisSectors') ? [] : ['className' => MoisSectorsTable::class];
        $this->MoisSectors = TableRegistry::getTableLocator()->get('MoisSectors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MoisSectors);

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

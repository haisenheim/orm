<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mois Model
 *
 * @property |\Cake\ORM\Association\BelongsToMany $Sectors
 *
 * @method \App\Model\Entity\Mois get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mois newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mois[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mois|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mois|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mois patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mois[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mois findOrCreate($search, callable $callback = null, $options = [])
 */
class MoisTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mois');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Sectors', [
            'foreignKey' => 'mois_id',
            'targetForeignKey' => 'sector_id',
            'joinTable' => 'mois_sectors'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 10)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('abb')
            ->maxLength('abb', 2)
            ->requirePresence('abb', 'create')
            ->notEmpty('abb');

        return $validator;
    }
}

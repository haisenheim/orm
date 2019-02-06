<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Annees Model
 *
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\HasMany $Sessions
 *
 * @method \App\Model\Entity\Annee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Annee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Annee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Annee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Annee|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Annee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Annee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Annee findOrCreate($search, callable $callback = null, $options = [])
 */
class AnneesTable extends Table
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

        $this->setTable('annees');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Sessions', [
            'foreignKey' => 'annee_id'
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
            ->maxLength('name', 5)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoisPlans Model
 *
 * @property \App\Model\Table\MoisTable|\Cake\ORM\Association\BelongsTo $Mois
 * @property \App\Model\Table\PlansTable|\Cake\ORM\Association\BelongsTo $Plans
 *
 * @method \App\Model\Entity\MoisPlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoisPlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MoisPlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoisPlan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoisPlan|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoisPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoisPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoisPlan findOrCreate($search, callable $callback = null, $options = [])
 */
class MoisPlansTable extends Table
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

        $this->setTable('mois_plans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Mois', [
            'foreignKey' => 'moi_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
            'joinType' => 'INNER'
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
            ->integer('objectif')
            ->requirePresence('objectif', 'create')
            ->notEmpty('objectif');

        $validator
            ->integer('realisation')
            ->requirePresence('realisation', 'create')
            ->notEmpty('realisation');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['moi_id'], 'Mois'));
        $rules->add($rules->existsIn(['plan_id'], 'Plans'));

        return $rules;
    }
}

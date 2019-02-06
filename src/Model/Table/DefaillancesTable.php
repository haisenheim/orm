<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Defaillances Model
 *
 * @property \App\Model\Table\RisquesTable|\Cake\ORM\Association\BelongsTo $Risques
 * @property \App\Model\Table\CausesTable|\Cake\ORM\Association\BelongsTo $Causes
 *
 * @method \App\Model\Entity\Defaillance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Defaillance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Defaillance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Defaillance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Defaillance|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Defaillance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Defaillance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Defaillance findOrCreate($search, callable $callback = null, $options = [])
 */
class DefaillancesTable extends Table
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

        $this->setTable('defaillances');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Risques', [
            'foreignKey' => 'risque_id'
        ]);
        $this->belongsTo('Causes', [
            'foreignKey' => 'cause_id'
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
            ->maxLength('name', 145)
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['risque_id'], 'Risques'));
        $rules->add($rules->existsIn(['cause_id'], 'Causes'));

        return $rules;
    }
}

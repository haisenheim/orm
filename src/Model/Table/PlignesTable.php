<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Plignes Model
 *
 * @property \App\Model\Table\PlansTable|\Cake\ORM\Association\BelongsTo $Plans
 * @property \App\Model\Table\PrsTable|\Cake\ORM\Association\BelongsTo $Prs
 * @property \App\Model\Table\PilotesTable|\Cake\ORM\Association\BelongsTo $Pilotes
 * @property \App\Model\Table\ContributeursTable|\Cake\ORM\Association\BelongsTo $Contributeurs
 *
 * @method \App\Model\Entity\Pligne get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pligne newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pligne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pligne|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pligne|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pligne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pligne[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pligne findOrCreate($search, callable $callback = null, $options = [])
 */
class PlignesTable extends Table
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

        $this->setTable('plignes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ProduitsRisques', [
            'foreignKey' => 'pr_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pilotes', [
            'className'=>'Users',
            'foreignKey' => 'pilote_id',
            'joinType' => 'Left'
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
        $rules->add($rules->existsIn(['plan_id'], 'Plans'));
        return $rules;
    }
}

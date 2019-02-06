<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChoicesDossiers Model
 *
 * @property \App\Model\Table\ChoicesTable|\Cake\ORM\Association\BelongsTo $Choices
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsTo $Dossiers
 *
 * @method \App\Model\Entity\ChoicesDossier get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChoicesDossier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ChoicesDossier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChoicesDossier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChoicesDossier|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChoicesDossier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChoicesDossier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChoicesDossier findOrCreate($search, callable $callback = null, $options = [])
 */
class ChoicesDossiersTable extends Table
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

        $this->setTable('choices_dossiers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Choices', [
            'foreignKey' => 'choice_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
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
        $rules->add($rules->existsIn(['choice_id'], 'Choices'));
        $rules->add($rules->existsIn(['dossier_id'], 'Dossiers'));

        return $rules;
    }
}

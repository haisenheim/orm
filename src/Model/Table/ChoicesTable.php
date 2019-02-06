<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Choices Model
 *
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\HasMany $Answers
 *
 * @method \App\Model\Entity\Choice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Choice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Choice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Choice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Choice|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Choice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Choice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Choice findOrCreate($search, callable $callback = null, $options = [])
 */
class ChoicesTable extends Table
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

        $this->setTable('choices');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id'
        ]);
        /*$this->hasMany('Answers', [
            'foreignKey' => 'choice_id'
        ]);*/

        $this->belongsToMany('Dossiers',[
            'foreignKey' => 'choice_id',
            'targetForeignKey' => 'dossier_id',
            'joinTable' => 'choices_dossiers'
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
            ->maxLength('name', 45)
            ->allowEmpty('name');

        $validator
            ->numeric('taux')
            ->allowEmpty('taux');

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
        $rules->add($rules->existsIn(['question_id'], 'Questions'));

        return $rules;
    }
}

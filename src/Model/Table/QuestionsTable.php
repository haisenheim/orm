<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \App\Model\Table\RisquesTable|\Cake\ORM\Association\BelongsTo $Risques
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\HasMany $Answers
 * @property \App\Model\Table\ChoicesTable|\Cake\ORM\Association\HasMany $Choices
 *
 * @method \App\Model\Entity\Question get($primaryKey, $options = [])
 * @method \App\Model\Entity\Question newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Question[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Question|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Question[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Question findOrCreate($search, callable $callback = null, $options = [])
 */
class QuestionsTable extends Table
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

        $this->setTable('questions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        /*$this->belongsTo('Risques', [
            'foreignKey' => 'risque_id'
        ]);*/
        /*$this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
        ]);*/

        $this->belongsTo('ProduitsRisques',[
           'foreignKey'=>'pr_id'
        ]);

       /* $this->hasMany('Answers', [
            'foreignKey' => 'question_id'
        ]);*/
        $this->hasMany('Choices', [
            'foreignKey' => 'question_id'
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
            ->maxLength('name', 200)
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
        $rules->add($rules->existsIn(['pr_id'], 'ProduitsRisques'));

        return $rules;
    }
}

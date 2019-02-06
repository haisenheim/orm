<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Risques Model
 *
 * @property \App\Model\Table\ActionsTable|\Cake\ORM\Association\HasMany $Actions
 * @property \App\Model\Table\DefaillancesTable|\Cake\ORM\Association\HasMany $Defaillances
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\HasMany $Questions
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsToMany $Produits
 *
 * @method \App\Model\Entity\Risque get($primaryKey, $options = [])
 * @method \App\Model\Entity\Risque newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Risque[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Risque|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Risque|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Risque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Risque[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Risque findOrCreate($search, callable $callback = null, $options = [])
 */
class RisquesTable extends Table
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

        $this->setTable('risques');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');


        $this->hasMany('Defaillances', [
            'foreignKey' => 'risque_id'
        ]);

        $this->hasMany('ProduitsRisques',['foreignKey'=>'risque_id']);

        $this->belongsToMany('Produits', [
            'foreignKey' => 'risque_id',
            'targetForeignKey' => 'produit_id',
            'joinTable' => 'produits_risques'
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

        return $validator;
    }
}

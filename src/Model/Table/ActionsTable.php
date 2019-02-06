<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actions Model
 *
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\RisquesTable|\Cake\ORM\Association\BelongsTo $Risques
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsToMany $Dossiers
 *
 * @method \App\Model\Entity\Action get($primaryKey, $options = [])
 * @method \App\Model\Entity\Action newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Action[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Action|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Action|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Action patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Action[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Action findOrCreate($search, callable $callback = null, $options = [])
 */
class ActionsTable extends Table
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

        $this->setTable('actions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
        ]);
        $this->belongsTo('Risques', [
            'foreignKey' => 'risque_id'
        ]);
        $this->belongsToMany('Dossiers', [
            'foreignKey' => 'action_id',
            'targetForeignKey' => 'dossier_id',
            'joinTable' => 'actions_dossiers'
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
            ->maxLength('name', 125)
            ->allowEmpty('name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));
        $rules->add($rules->existsIn(['risque_id'], 'Risques'));

        return $rules;
    }
}

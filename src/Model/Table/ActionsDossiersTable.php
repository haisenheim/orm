<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActionsDossiers Model
 *
 * @property \App\Model\Table\ActionsTable|\Cake\ORM\Association\BelongsTo $Actions
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsTo $Dossiers
 * @property \App\Model\Table\ResponsablesTable|\Cake\ORM\Association\BelongsTo $Responsables
 *
 * @method \App\Model\Entity\ActionsDossier get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActionsDossier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActionsDossier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActionsDossier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActionsDossier|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActionsDossier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActionsDossier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActionsDossier findOrCreate($search, callable $callback = null, $options = [])
 */
class ActionsDossiersTable extends Table
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

        $this->setTable('actions_dossiers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Actions', [
            'foreignKey' => 'action_id'
        ]);
        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id'
        ]);
        $this->belongsTo('Responsables', [
            'foreignKey' => 'responsable_id'
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
            ->scalar('commentaire')
            ->allowEmpty('commentaire');

        $validator
            ->dateTime('date_limit')
            ->allowEmpty('date_limit');

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
        $rules->add($rules->existsIn(['action_id'], 'Actions'));
        $rules->add($rules->existsIn(['dossier_id'], 'Dossiers'));
        $rules->add($rules->existsIn(['responsable_id'], 'Responsables'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MoisTclients Model
 *
 * @property \App\Model\Table\MoisTable|\Cake\ORM\Association\BelongsTo $Mois
 * @property |\Cake\ORM\Association\BelongsTo $Tclients
 *
 * @method \App\Model\Entity\MoisTclient get($primaryKey, $options = [])
 * @method \App\Model\Entity\MoisTclient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MoisTclient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MoisTclient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoisTclient|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MoisTclient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MoisTclient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MoisTclient findOrCreate($search, callable $callback = null, $options = [])
 */
class MoisTclientsTable extends Table
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

        $this->setTable('mois_tclients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Mois', [
            'foreignKey' => 'moi_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tclients', [
            'foreignKey' => 'tclient_id',
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
        $rules->add($rules->existsIn(['tclient_id'], 'Tclients'));

        return $rules;
    }
}

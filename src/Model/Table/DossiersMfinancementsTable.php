<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DossiersMfinancements Model
 *
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsTo $Dossiers
 * @property \App\Model\Table\MfinancementsTable|\Cake\ORM\Association\BelongsTo $Mfinancements
 *
 * @method \App\Model\Entity\DossiersMfinancement get($primaryKey, $options = [])
 * @method \App\Model\Entity\DossiersMfinancement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DossiersMfinancement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DossiersMfinancement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DossiersMfinancement|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DossiersMfinancement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DossiersMfinancement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DossiersMfinancement findOrCreate($search, callable $callback = null, $options = [])
 */
class DossiersMfinancementsTable extends Table
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

        $this->setTable('dossiers_mfinancements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Mfinancements', [
            'foreignKey' => 'mfinancement_id',
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
        $rules->add($rules->existsIn(['dossier_id'], 'Dossiers'));
        $rules->add($rules->existsIn(['mfinancement_id'], 'Mfinancements'));

        return $rules;
    }
}

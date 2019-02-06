<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DossiersTimmobilisations Model
 *
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsTo $Dossiers
 * @property \App\Model\Table\TimmobilisationsTable|\Cake\ORM\Association\BelongsTo $Timmobilisations
 *
 * @method \App\Model\Entity\DossiersTimmobilisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DossiersTimmobilisation findOrCreate($search, callable $callback = null, $options = [])
 */
class DossiersTimmobilisationsTable extends Table
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

        $this->setTable('dossiers_timmobilisations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Timmobilisations', [
            'foreignKey' => 'timmobilisation_id',
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
        $rules->add($rules->existsIn(['timmobilisation_id'], 'Timmobilisations'));

        return $rules;
    }
}

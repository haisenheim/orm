<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Timmobilisations Model
 *
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\HasMany $Dossiers
 *
 * @method \App\Model\Entity\Timmobilisation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Timmobilisation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Timmobilisation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Timmobilisation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timmobilisation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timmobilisation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Timmobilisation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Timmobilisation findOrCreate($search, callable $callback = null, $options = [])
 */
class TimmobilisationsTable extends Table
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

        $this->setTable('timmobilisations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Dossiers', [
            'foreignKey' => 'timmobilisation_id'
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

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actifs Model
 *
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsToMany $Dossiers
 *
 * @method \App\Model\Entity\Actif get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actif newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Actif[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actif|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actif|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actif patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actif[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actif findOrCreate($search, callable $callback = null, $options = [])
 */
class ActifsTable extends Table
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

        $this->setTable('actifs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Dossiers', [
            'foreignKey' => 'actif_id',
            'targetForeignKey' => 'dossier_id',
            'joinTable' => 'actifs_dossiers'
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}

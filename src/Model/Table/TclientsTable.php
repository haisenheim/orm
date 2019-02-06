<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tclients Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\HasMany $Clients
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\HasMany $Roles
 *
 * @method \App\Model\Entity\Tclient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tclient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tclient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tclient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tclient|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tclient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tclient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tclient findOrCreate($search, callable $callback = null, $options = [])
 */
class TclientsTable extends Table
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

        $this->setTable('tclients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Clients', [
            'foreignKey' => 'tclient_id'
        ]);

        $this->belongsToMany('Mois', [
            'foreignKey' => 'tclient_id',
            'targetForeignKey' => 'moi_id',
            'joinTable' => 'mois_tclients'
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

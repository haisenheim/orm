<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sectors Model
 *
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\HasMany $Produits
 *
 * @method \App\Model\Entity\Sector get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sector newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sector[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sector|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sector|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sector patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sector[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sector findOrCreate($search, callable $callback = null, $options = [])
 */
class SectorsTable extends Table
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

        $this->setTable('sectors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Produits', [
            'foreignKey' => 'sector_id'
        ]);

        $this->belongsToMany('Mois', [
            'foreignKey' => 'sector_id',
            'targetForeignKey' => 'moi_id',
            'joinTable' => 'mois_sectors'
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

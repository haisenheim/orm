<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DossiersProduits Model
 *
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\BelongsTo $Dossiers
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 *
 * @method \App\Model\Entity\DossiersProduit get($primaryKey, $options = [])
 * @method \App\Model\Entity\DossiersProduit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DossiersProduit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DossiersProduit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DossiersProduit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DossiersProduit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DossiersProduit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DossiersProduit findOrCreate($search, callable $callback = null, $options = [])
 */
class DossiersProduitsTable extends Table
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

        $this->setTable('dossiers_produits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dossiers', [
            'foreignKey' => 'dossier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id',
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
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));

        return $rules;
    }
}

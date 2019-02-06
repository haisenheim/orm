<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produits Model
 *
 * @property \App\Model\Table\SectorsTable|\Cake\ORM\Association\BelongsTo $Sectors
 * @property \App\Model\Table\ActionsTable|\Cake\ORM\Association\HasMany $Actions
 * @property \App\Model\Table\DossiersTable|\Cake\ORM\Association\HasMany $Dossiers
 * @property \App\Model\Table\RisquesTable|\Cake\ORM\Association\BelongsToMany $Risques
 *
 * @method \App\Model\Entity\Produit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produit findOrCreate($search, callable $callback = null, $options = [])
 */
class ProduitsTable extends Table
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

        $this->setTable('produits');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sectors', [
            'foreignKey' => 'sector_id'
        ]);

        /*$this->hasMany('Dossiers', [
            'foreignKey' => 'produit_id'
        ]);*/

        $this->hasMany('ProduitsRisques', [
            'foreignKey' => 'produit_id'
        ]);


        $this->belongsToMany('Risques', [
            'foreignKey' => 'produit_id',
            'targetForeignKey' => 'risque_id',
            'joinTable' => 'produits_risques'
        ]);

        $this->belongsToMany('Dossiers', [
            'foreignKey' => 'produit_id',
            'targetForeignKey' => 'dossier_id',
            'joinTable' => 'dossiers_produits'
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

        return $rules;
    }
}

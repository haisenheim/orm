<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProduitsRisques Model
 *
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\RisquesTable|\Cake\ORM\Association\BelongsTo $Risques
 *
 * @method \App\Model\Entity\ProduitsRisque get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProduitsRisque newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProduitsRisque[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsRisque|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduitsRisque|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduitsRisque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsRisque[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsRisque findOrCreate($search, callable $callback = null, $options = [])
 */
class ProduitsRisquesTable extends Table
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

        $this->setTable('produits_risques');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id'
        ]);
        $this->belongsTo('Risques', [
            'foreignKey' => 'risque_id'
        ]);

        $this->hasOne('Questions',[
            'foreignKey'=>'pr_id'
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
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));
        $rules->add($rules->existsIn(['risque_id'], 'Risques'));

        return $rules;
    }
}

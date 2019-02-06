<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dossiers Model
 *
 * @property \App\Model\Table\OwnersTable|\Cake\ORM\Association\BelongsTo $Owners
 * @property \App\Model\Table\MarketersTable|\Cake\ORM\Association\BelongsTo $Marketers
 * @property \App\Model\Table\AutorsTable|\Cake\ORM\Association\BelongsTo $Autors
 * @property \App\Model\Table\ProduitsTable|\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\TimmobilisationsTable|\Cake\ORM\Association\BelongsTo $Timmobilisations
 * @property \App\Model\Table\MfinancementsTable|\Cake\ORM\Association\BelongsTo $Mfinancements
 * @property \App\Model\Table\AnswersTable|\Cake\ORM\Association\HasMany $Answers
 * @property \App\Model\Table\ActionsTable|\Cake\ORM\Association\BelongsToMany $Actions
 *
 * @method \App\Model\Entity\Dossier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dossier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dossier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dossier|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dossier|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dossier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dossier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dossier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DossiersTable extends Table
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

        $this->setTable('dossiers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Owners', [
            'className'=>'Clients',
            'foreignKey' => 'owner_id'
        ]);
        $this->belongsTo('Clients', [
            'className'=>'Clients',
            'foreignKey' => 'client_id'
        ]);
        $this->belongsTo('Autors', [
            'className'=>'Users',
            'foreignKey' => 'autor_id'
        ]);

        $this->belongsTo('Experts', [
            'className'=>'Users',
            'foreignKey' => 'expert_id',
            'joinType'=>'Left'
        ]);
        /*$this->belongsTo('Produits', [
            'foreignKey' => 'produit_id',
            'JoinType'=>'INNER'
        ]);*/
        /*$this->belongsTo('Timmobilisations', [
            'foreignKey' => 'timmobilisation_id'
        ]);*/
        $this->belongsTo('Mfinancements', [
            'foreignKey' => 'mfinancement_id'
        ]);
        $this->belongsToMany('Choices',[
            'foreignKey' => 'dossier_id',
            'targetForeignKey' => 'choice_id',
            'joinTable' => 'choices_dossiers'
        ]);

        $this->hasOne('Plans',[
            'foreignKey'=>'dossier_id'
        ]);

        $this->belongsToMany('Produits', [
            'foreignKey' => 'dossier_id',
            'targetForeignKey' => 'produit_id',
            'joinTable' => 'dossiers_produits'
        ]);

        $this->belongsToMany('Actifs', [
            'foreignKey' => 'dossier_id',
            'targetForeignKey' => 'actif_id',
            'joinTable' => 'actifs_dossiers'
        ]);

        $this->belongsToMany('Timmobilisations', [
            'foreignKey' => 'dossier_id',
            'targetForeignKey' => 'timmobilisation_id',
            'joinTable' => 'dossiers_timmobilisations'
        ]);

        $this->belongsToMany('Mfinancements', [
            'foreignKey' => 'dossier_id',
            'targetForeignKey' => 'mfinancement_id',
            'joinTable' => 'dossiers_mfinancements'
        ]);

    }



/*
    public function findRiques(Query $query, array $options)
    {
        $query->where([
            'Articles.published' => true,
            'Articles.moderated' => true
        ]);
        return $query;
    }*/

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

        $validator
            ->integer('ca1')
            ->allowEmpty('ca1');

        $validator
            ->integer('ca2')
            ->allowEmpty('ca2');

        $validator
            ->integer('ca3')
            ->allowEmpty('ca3');

        $validator
            ->integer('cout1')
            ->allowEmpty('cout1');

        $validator
            ->integer('cout2')
            ->allowEmpty('cout2');

        $validator
            ->integer('cout3')
            ->allowEmpty('cout3');

        $validator
            ->integer('delai')
            ->allowEmpty('delai');

        $validator
            ->integer('apport_personnel')
            ->allowEmpty('apport_personnel');

        $validator
            ->integer('apport_associes')
            ->allowEmpty('apport_associes');

        $validator
            ->integer('emprunt')
            ->allowEmpty('emprunt');

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
        $rules->add($rules->existsIn(['autor_id'], 'Autors'));


        return $rules;
    }
}

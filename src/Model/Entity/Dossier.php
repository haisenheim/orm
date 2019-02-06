<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dossier Entity
 *
 * @property int $id
 * @property string $name
 * @property string $created
 * @property int $owner_id
 * @property int $marketer_id
 * @property int $autor_id
 * @property int $produit_id
 * @property int $ca1
 * @property int $ca2
 * @property int $ca3
 * @property int $cout1
 * @property int $cout2
 * @property int $cout3
 * @property int $delai
 * @property int $apport_personnel
 * @property int $apport_associes
 * @property int $emprunt
 * @property int $timmobilisation_id
 * @property int $mfinancement_id
 *
 * @property \App\Model\Entity\Owner $owner
 * @property \App\Model\Entity\Marketer $marketer
 * @property \App\Model\Entity\Autor $autor
 * @property \App\Model\Entity\Produit $produit
 * @property \App\Model\Entity\Timmobilisation $timmobilisation
 * @property \App\Model\Entity\Mfinancement $mfinancement
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Action[] $actions
 */
class Dossier extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'created' => true,
        'owner_id' => true,
        'marketer_id' => true,
        'autor_id' => true,
        'produit_id' => true,
        'ca1' => true,
        'ca2' => true,
        'ca3' => true,
        'cout1' => true,
        'cout2' => true,
        'cout3' => true,
        'delai' => true,
        'apport_personnel' => true,
        'apport_associes' => true,
        'emprunt' => true,


        'owner' => true,
        'marketer' => true,
        'autor' => true,
        'produit' => true,

        'answers' => true,
        'actions' => true
    ];



    protected function _getArisque(){
        $valeur = false;

        if(!empty($this->produits)){

            foreach($this->produits as $produit){
                if(!empty($produit->risques)){
                    foreach($produit->risques as $rk){
                       // debug($rk); die();
                        if($rk->cn>=4){
                            $valeur = true;
                        }
                    }
                }
            }
        }

        return $valeur;
    }

    protected function _getAlerte(){
        $ret = 3;
        if(!empty($this->plan)){
            $ret=$this->plan->alerte;
        }

        return $ret;
    }

}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Plan Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property int $user_id
 * @property int $name
 * @property int $dossier_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Dossier $dossier
 * @property \App\Model\Entity\Pligne[] $plignes
 */
class Plan extends Entity
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
        'created' => true,
        'user_id' => true,
        'name' => true,
        'dossier_id' => true,
        'user' => true,
        'dossier' => true,
        'plignes' => true
    ];


    protected function _getAlerte(){
        $ret = 3;
        if(!empty($this->plignes)){
            foreach($this->plignes as $pl){
                if($pl->alerte<$ret){
                    $ret=$pl->alerte;
                }
            }
        }

        return $ret;
    }
}

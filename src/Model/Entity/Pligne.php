<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pligne Entity
 *
 * @property int $id
 * @property int $plan_id
 * @property int $pr_id
 * @property string $amelioration
 * @property int $niveau
 * @property int $echeance
 * @property int $pilote_id
 * @property int $contributeur_id
 * @property string $modalites
 *
 * @property \App\Model\Entity\Plan $plan
 * @property \App\Model\Entity\Pr $pr
 * @property \App\Model\Entity\Pilote $pilote
 * @property \App\Model\Entity\Contributeur $contributeur
 */
class Pligne extends Entity
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
        'plan_id' => true,
        'pr_id' => true,
        'amelioration' => true,
        'niveau' => true,
        'echeance' => true,
        'pilote_id' => true,
        'contributeur_id' => true,
        'modalites' => true,
        'plan' => true,
        'pr' => true,
        'pilote' => true,
        'contributeur' => true
    ];

    protected function _getAlerte(){

        if($this->echeance){
            if( Date($this->echeance) < Date('Y-m-d')) {
                $nb=date_diff($this->echeance, new \DateTime())->d;
                if ( ($nb<30)&&($nb>14)){
                    return 2;
                }
                if ( ($nb <= 14)&&($nb>7)){
                    return 1;
                }
                if ( ($nb <=7)){
                    return 0;
                }
            }
        }

        return 3;
    }
}

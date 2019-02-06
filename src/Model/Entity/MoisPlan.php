<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MoisPlan Entity
 *
 * @property int $id
 * @property int $moi_id
 * @property int $plan_id
 * @property int $objectif
 * @property int $realisation
 *
 * @property \App\Model\Entity\Mois $mois
 * @property \App\Model\Entity\Plan $plan
 */
class MoisPlan extends Entity
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
        'moi_id' => true,
        'plan_id' => true,
        'objectif' => true,
        'realisation' => true,
        'mois' => true,
        'plan' => true
    ];
}

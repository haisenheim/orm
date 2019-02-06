<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MoisTclient Entity
 *
 * @property int $id
 * @property int $moi_id
 * @property int $tclient_id
 * @property int $objectif
 * @property int $realisation
 *
 * @property \App\Model\Entity\Mois $mois
 * @property \App\Model\Entity\Sector $sector
 */
class MoisTclient extends Entity
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
        'tclient_id' => true,
        'objectif' => true,
        'realisation' => true,
        'mois' => true,
        'sector' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DossiersMfinancement Entity
 *
 * @property int $id
 * @property int $dossier_id
 * @property int $mfinancement_id
 *
 * @property \App\Model\Entity\Dossier $dossier
 * @property \App\Model\Entity\Mfinancement $mfinancement
 */
class DossiersMfinancement extends Entity
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
        'dossier_id' => true,
        'mfinancement_id' => true,
        'dossier' => true,
        'mfinancement' => true
    ];
}

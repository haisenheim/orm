<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DossiersTimmobilisation Entity
 *
 * @property int $id
 * @property int $dossier_id
 * @property int $timmobilisation_id
 *
 * @property \App\Model\Entity\Dossier $dossier
 * @property \App\Model\Entity\Timmobilisation $timmobilisation
 */
class DossiersTimmobilisation extends Entity
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
        'timmobilisation_id' => true,
        'dossier' => true,
        'timmobilisation' => true
    ];
}

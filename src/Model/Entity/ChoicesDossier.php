<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChoicesDossier Entity
 *
 * @property int $id
 * @property int $choice_id
 * @property int $dossier_id
 *
 * @property \App\Model\Entity\Choice $choice
 * @property \App\Model\Entity\Dossier $dossier
 */
class ChoicesDossier extends Entity
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
        'choice_id' => true,
        'dossier_id' => true,
        'choice' => true,
        'dossier' => true
    ];
}

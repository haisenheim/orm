<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActionsDossier Entity
 *
 * @property int $id
 * @property int $action_id
 * @property int $dossier_id
 * @property string $commentaire
 * @property \Cake\I18n\FrozenTime $date_limit
 * @property int $responsable_id
 *
 * @property \App\Model\Entity\Action $action
 * @property \App\Model\Entity\Dossier $dossier
 * @property \App\Model\Entity\Responsable $responsable
 */
class ActionsDossier extends Entity
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
        'action_id' => true,
        'dossier_id' => true,
        'commentaire' => true,
        'date_limit' => true,
        'responsable_id' => true,
        'action' => true,
        'dossier' => true,
        'responsable' => true
    ];
}

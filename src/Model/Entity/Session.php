<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $created
 * @property \Cake\I18n\FrozenTime $login
 * @property \Cake\I18n\FrozenTime $logout
 * @property int $annee_id
 * @property int $moi_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Annee $annee
 * @property \App\Model\Entity\Mois $mois
 */
class Session extends Entity
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
        'user_id' => true,
        'created' => true,
        'login' => true,
        'logout' => true,
        'annee_id' => true,
        'moi_id' => true,
        'user' => true,
        'annee' => true,
        'mois' => true
    ];
}

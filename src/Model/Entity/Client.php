<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property int $tclient_id
 * @property int $user_count
 *
 * @property \App\Model\Entity\Tclient $tclient
 * @property \App\Model\Entity\User[] $users
 */
class Client extends Entity
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
        'address' => true,
        'phone' => true,
        'email' => true,
        'tclient_id' => true,
        'user_count' => true,
        'tclient' => true,
        'users' => true
    ];
}

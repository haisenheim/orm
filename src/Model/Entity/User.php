<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property string $last_name
 * @property string $first_name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property int $compagny_id
 * @property int $login_count
 * @property \Cake\I18n\FrozenTime $last_connexion
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Compagny $compagny
 */
class User extends Entity
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
        '*' => true,
        'id'=>false

    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

    protected function _getName(){
        return $this->first_name."  ".$this->last_name;
    }
}

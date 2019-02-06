<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Action Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $produit_id
 * @property int $risque_id
 *
 * @property \App\Model\Entity\Produit $produit
 * @property \App\Model\Entity\Risque $risque
 * @property \App\Model\Entity\Dossier[] $dossiers
 */
class Action extends Entity
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
        'description' => true,
        'produit_id' => true,
        'risque_id' => true,
        'produit' => true,
        'risque' => true,
        'dossiers' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Question Entity
 *
 * @property int $id
 * @property string $name
 * @property bool $maitrise?
 * @property int $risque_id
 *
 * @property \App\Model\Entity\Risque $risque
 * @property \App\Model\Entity\Answer[] $answers
 * @property \App\Model\Entity\Choice[] $choices
 */
class Question extends Entity
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
        'risque_id' => true,
        'risque' => true,
        'answers' => true,
        'choices' => true
    ];
}

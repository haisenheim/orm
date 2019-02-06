<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Choice Entity
 *
 * @property int $id
 * @property string $name
 * @property int $question_id
 * @property float $taux
 *
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Answer[] $answers
 */
class Choice extends Entity
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
        'question_id' => true,
        'taux' => true,
        'question' => true,
        'answers' => true
    ];
}

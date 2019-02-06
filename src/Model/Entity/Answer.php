<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property int $id
 * @property int $dossier_id
 * @property int $question_id
 * @property int $choice_id
 * @property string $note
 *
 * @property \App\Model\Entity\Dossier $dossier
 * @property \App\Model\Entity\Question $question
 * @property \App\Model\Entity\Choice $choice
 */
class Answer extends Entity
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
        'question_id' => true,
        'choice_id' => true,
        'note' => true,
        'dossier' => true,
        'question' => true,
        'choice' => true
    ];
}

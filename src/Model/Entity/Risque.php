<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Risque Entity
 *
 * @property int $id
 * @property string $name
 *
 * @property \App\Model\Entity\Action[] $actions
 * @property \App\Model\Entity\Defaillance[] $defaillances
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Produit[] $produits
 */
class Risque extends Entity
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
        'actions' => true,
        'defaillances' => true,
        'questions' => true,
        'produits' => true
    ];


    protected function _getCb(){
        $c=0;
        if(!empty($this->_joinData)){
            if(!empty($this->_joinData->frequence)&&(!empty($this->_joinData->gravite))){
                $c= $this->_joinData->frequence * $this->_joinData->gravite;
            }
        }

        return $c;
    }


    protected function _getClrb(){
        $c = $this->_getCb();
        $color = '';
        if($c>0){
            if($c >= 13){
                $color='red';
            }else{
                if($c >=4 & $c <= 12){
                    $color='yellow';
                }else{
                    $color = 'green';
                }
            }
        }
        return $color;
    }

    protected function _getCn(){
        $c=0;
        if(!empty($this->lines)){
            $s=0;
            foreach($this->lines as $l){
                $s=$s+ ($l->choice?$l->choice->taux:0);
            }
            $c=$s/(count($this->lines));
        }

        return $c * $this->_getCb();
    }

    protected function _getClrn(){
        $c = $this->_getCn();
        $color = "";
        if($c>0){
            if($c >= 13){
                $color='red';
            }else{
                if($c >=4 & $c <= 12){
                    $color='yellow';
                }else{
                    $color = 'green';
                }
            }
        }
        return $color;
    }
}

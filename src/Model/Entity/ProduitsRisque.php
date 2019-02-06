<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProduitsRisque Entity
 *
 * @property int $id
 * @property float $citicite_but
 * @property int $produit_id
 * @property int $risque_id
 *
 * @property \App\Model\Entity\Produit $produit
 * @property \App\Model\Entity\Risque $risque
 */
class ProduitsRisque extends Entity
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
        'citicite_but' => true,
        'produit_id' => true,
        'risque_id' => true,
        'produit' => true,
        'risque' => true
    ];



    protected function _getCb(){
        $c=0;

            if(!empty($this->frequence)&&(!empty($this->gravite))){
                $c= $this->frequence * $this->gravite;
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

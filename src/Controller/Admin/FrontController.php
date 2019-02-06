<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 */
class FrontController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */




    public function index()
    {

        $this->loadModel('MoisSectors');
        $m=date('m');
        $m_1=$m==1?12:$m-1;
        $experts = $this->MoisSectors->find()->where(['moi_id'=>$m])->orWhere(['moi_id'=>$m_1])->contain(['Sectors'])->all();
        $col = new Collection($experts);
        $ms= $col->groupBy(function($q){
            return $q->sector->name;
        });
        $ms=$ms->toArray();
        //debug($ms); die();
        $results=[];
        foreach($ms as $key => $values){
           if($values[0]->moi_id==1 && $values[1]->moi_id==12){
             $results[$key] = [0=>$values[1],1=>$values[0]];
           }elseif($values[0]->moi_id>$values[1]->moi_id){
               $results[$key] = [0=>$values[1],1=>$values[0]];
           }else{
               $results[$key] = [0=>$values[0],1=>$values[1]];
           }
        }


        $this->loadModel('MoisTclients');

        $tclients = $this->MoisTclients->find()->where(['moi_id'=>$m])->orWhere(['moi_id'=>$m_1])->contain(['Tclients'])->all();
        $col = new Collection($tclients);
        $mts= $col->groupBy(function($q){
            return $q->tclient->name;
        });
        $mts=$mts->toArray();
        //debug($ms); die();

        $mtcs=[];
        foreach($mts as $key => $values){
            if($values[0]->moi_id==1 && $values[1]->moi_id==12){
                $mtcs[$key] = [0=>$values[1],1=>$values[0]];
            }elseif($values[0]->moi_id>$values[1]->moi_id){
                $mtcs[$key] = [0=>$values[1],1=>$values[0]];
            }else{
                $mtcs[$key] = [0=>$values[0],1=>$values[1]];
            }
        }

        //debug($results); die();
        $this->set(compact('results','mtcs'));


        $this->loadModel('Plans');
        $plans=$this->Plans->find()->where(['DATE_FORMAT(Plans.created,"%m")'=>$m])->orWhere(['DATE_FORMAT(Plans.created,"%m")'=>$m_1])->contain(['Dossiers.Produits.Sectors'])->all();

       /* $this->loadModel('Sectors');
        $sectors= $this->Sectors->find()->contain(['Produits.Dossiers.Plans'=>function($q) use($m){
           return $q->where(['DATE_FORMAT(Plans.created,"%m")'=>$m]);
        }])->all();*/


        //debug($plans); die();

    }





}

<?php
namespace App\Controller\Expert;

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

        $this->loadModel('Dossiers');

        $dossiers=$this->Dossiers->find()->where(['Dossiers.expert_id'=>$this->Auth->user()['id']])->contain(['Plans.Plignes','Owners'])->all();
        $this->loadModel('DossiersProduits');
        $urgences = [];

        foreach ($dossiers as $dossier) {
            $urgent=false;
            if(!empty($dossier->plan)){
                foreach($dossier->plan->plignes as $pligne){

                    if($pligne->echeance){
                        if( Date($pligne->echeance) < Date('Y-m-d')) {
                            $nb=date_diff($pligne->echeance, new \DateTime())->d;
                            if($nb<=30){
                                $urgent=true;
                            }
                        }
                    }
                }
                if($urgent){
                    $urgences[]=$dossier;
                }
            }


        }

        $dossiers=$urgences;

        $user_id = $this->Auth->user()['id'];

        $prs=$this->DossiersProduits->find()->contain(['Produits','Dossiers'=>function($q) use($user_id){
            return $q->where(['expert_id'=>$user_id]);
        } ])->all();

        $collection = new Collection($prs);
        $collection=$collection->groupBy(function($q){return $q->produit->name;});
        // $collection=$collection->each(function($k,$v){return count($k);});

        $prs=$collection->toArray();
        $results=[];
        foreach($prs as $k=>$v){
            $results[$k]=count($v);
        }
        $this->set(compact('dossiers','results'));

    }


}

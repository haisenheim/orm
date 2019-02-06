<?php
namespace App\Controller\Etf;

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


  /* public function beforeFilter(Event $event){
       parent::beforeRender($event);
       $this->Auth->allow(['view', 'index']);
   }*/

    public function index()
    {

        $this->loadModel('Dossiers');
        $client_id=$this->Auth->user()['client_id'];
        $dossiers=$this->Dossiers->find()->where(['Dossiers.client_id'=>$client_id])->contain(['Plans.Plignes','Owners'])->all();
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

        $prs=$this->DossiersProduits->find()->contain(['Produits','Dossiers'=>function($q)use($client_id){
            return $q->where(['client_id'=>$client_id]);
        }])->all();

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

    public function chart(){
        if($this->request->is('ajax')){
            $this->loadModel('DossiersProduits');
            $prs=$this->DossiersProduits->find()->where(['Dossiers.client_id'=>$this->Auth->user()['client_id']])->contain(['Produits','Dossiers'])->all();

            $collection = new Collection($prs);
            $collection=$collection->groupBy(function($q){return $q->produit->name;});

            $prs=$collection->toArray();
            $results=[];
            foreach($prs as $k=>$v){
                $results[$k]=count($v);
            }
            $this->set(compact('results'));
        }

        $this->set('_serialize',true);
    }


}

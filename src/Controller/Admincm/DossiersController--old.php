<?php
namespace App\Controller\Admincm;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Dossiers Controller
 *
 * @property \App\Model\Table\DossiersTable $Dossiers
 *
 * @method \App\Model\Entity\Dossier[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DossiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Clients');
        $clients = $this->Clients->find()->where(['Clients.client_id'=>$this->Auth->user()['client_id']])->all();
        $ids=[];
        foreach($clients as $clt){
            $ids[]=$clt->id;
        }
        $dossiers =  $this->paginate($this->Dossiers->find()->where(['Dossiers.client_id'=>$this->Auth->user()['client_id']])->contain(['Owners']));
        $title ='<i class="fa fa-folder-open"></i> LISTE DES DOSSIERS';

        $this->set(compact('dossiers','title'));
    }




    /**
     * View method
     *
     * @param string|null $id Dossier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $doss = $this->Dossiers->get($id,['contain'=>['Produits']]);

        $p=[];
        if(!empty($doss->produits))
        foreach($doss->produits as $prd){
            $p[]=$prd->id;
        }

        //$p=$doss->produits;

        $dossier = $this->Dossiers->get($id, [
            'contain' => ['Owners', 'Autors','Produits.Risques','Plans'

                , 'Timmobilisations', 'Mfinancements'
                ,
                'Answers.Choices.Questions'=>function($q)use($p){
                    return $q->where(['Questions.produit_id in'=>$p]);
                }]
        ]);


        $ans=$dossier->answers;
        //debug($dossier->produits); die();
            foreach($dossier->produits as $produit){
                foreach($produit->risques as $risk){
                    $risk->set('lines',[]);
                    foreach($ans as $a){
                        //debug($a->choice); die();
                        if($a->choice->question->risque_id==$risk->id){
                            $risk->lines[]=$a;
                            break;
                        }
                }
            }
        }

        $title = '<span class="value"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;'. $dossier->name .'</span>';

        $this->set(compact('title'));
        $this->set('dossier', $dossier);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dossier = $this->Dossiers->newEntity();
        if ($this->request->is('post')) {
            $dossier = $this->Dossiers->patchEntity($dossier, $this->request->getData());
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('The dossier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossier could not be saved. Please, try again.'));
        }


        $produits = $this->Dossiers->Produits->find()->all();
        $timmobilisations = $this->Dossiers->Timmobilisations->find()->all();
        $mfinancements = $this->Dossiers->Mfinancements->find()->all();
        $sectors = $this->Dossiers->Produits->Sectors->find()->all();
        $title ='<i class="fa fa-folder-open"></i> NOUVEAU DOSSIER';
        $this->set(compact('dossier', 'produits', 'timmobilisations', 'mfinancements','sectors','title'));
    }



    public function createPlan($id){
        $doss = $this->Dossiers->get($id,['contain'=>['Produits']]);
        $p=[];
        if(!empty($doss->produits))
            foreach($doss->produits as $prd){
                $p[]=$prd->id;
            }

        $dossier = $this->Dossiers->get($id, [
            'contain' => ['Owners',  'Autors','Produits.Risques','Plans'

                , 'Timmobilisations', 'Mfinancements'
                ,
                'Answers.Choices.Questions'=>function($q)use($p){
                    return $q->where(['Questions.produit_id in'=>$p]);
                }]
        ]);

        $ans=$dossier->answers;
        foreach($dossier->produits as $produit){
            foreach($produit->risques as $risk){
                $risk->set('lines',[]);
                foreach($ans as $a){
                    if($a->choice->question->risque_id==$risk->id){
                        $risk->lines[]=$a;
                        break;
                    }
                }
            }
        }


       // $risks = $dossier->produit->risques;

        if($dossier->arisque){
            $this->loadModel('Plans');
            $this->loadModel('Plignes');
            $this->loadModel('ProduitsRisques');
            $plan = $this->Plans->newEntity();
            $plan->dossier_id = $dossier->id;
            $plan->user_id = $this->Auth?$this->Auth->user()['id']:0;
            $plan->name = $dossier->id . date('Hdmy');
            $plan = $this->Plans->save($plan);

            foreach($dossier->produits as $prdt){
                foreach($prdt->risques as $rk){
                    if($rk->cn>=4){
                        $pl = $this->Plignes->newEntity();
                        $pl->plan_id=$plan->id;
                        $pl->pr_id=$rk->_joinData->id;
                        $pl=$this->Plignes->save($pl);
                    }
                }
            }
            return $this->redirect(['controller'=>'Plans', 'action'=>'view', $plan->id]);
        }else{
            $this->Flash->error('Le plan d\'action n\'a pas ete genere !!! ');
            return $this->redirect($this->referer());
        }

    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////
    public function  viewPlan($id){

    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function saveJson(){
        if($this->request->is('ajax')){
            $data = $this->request->getData('dossier');
            $produits=$this->request->getData('produits');
            $answers =$this->request->getData('answers');
            $dossier = $this->Dossiers->newEntity();
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
            $dossier->autor_id = $this->Auth->user()['id'];
            $dossier->client_id=$this->Auth->user()['client_id'];
           // debug($answers); die();
            if($dossier = $this->Dossiers->save($dossier)){
                $this->loadModel('DossiersProduits');

                for($i = 0; $i<count($produits);$i++){
                    $dp = $this->DossiersProduits->newEntity();
                    $dp->produit_id = $produits[$i];
                    $dp->dossier_id = $dossier->id;
                    $this->DossiersProduits->save($dp);
                }

                $this->loadModel('Answers');
                foreach($answers as $answer){
                    $an=$this->Answers->newEntity();
                    $an->question_id=$answer['question_id'];
                    $an->choice_id=$answer['choice_id'];
                    $an->dossier_id=$dossier->id;
                    $an=$this->Answers->save($an);
                   // debug($an);
                }

            }
            $id=$dossier->id;
            $this->set(compact('id'));
            $this->set('_serialize','id');
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Dossier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dossier = $this->Dossiers->get($id, [
            'contain' => ['Actions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dossier = $this->Dossiers->patchEntity($dossier, $this->request->getData());
            if ($this->Dossiers->save($dossier)) {
                $this->Flash->success(__('The dossier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossier could not be saved. Please, try again.'));
        }
        $owners = $this->Dossiers->Owners->find('list', ['limit' => 200]);
        $marketers = $this->Dossiers->Marketers->find('list', ['limit' => 200]);
        $autors = $this->Dossiers->Autors->find('list', ['limit' => 200]);
        $produits = $this->Dossiers->Produits->find('list', ['limit' => 200]);
        $timmobilisations = $this->Dossiers->Timmobilisations->find('list', ['limit' => 200]);
        $mfinancements = $this->Dossiers->Mfinancements->find('list', ['limit' => 200]);
        $actions = $this->Dossiers->Actions->find('list', ['limit' => 200]);
        $this->set(compact('dossier', 'owners', 'marketers', 'autors', 'produits', 'timmobilisations', 'mfinancements', 'actions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dossier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dossier = $this->Dossiers->get($id);
        if ($this->Dossiers->delete($dossier)) {
            $this->Flash->success(__('The dossier has been deleted.'));
        } else {
            $this->Flash->error(__('The dossier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

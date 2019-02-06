<?php
namespace App\Controller\Admin;

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
        $role=$this->Auth->user()['role_id'];
        $user=$this->Auth->user()['id'];
        $client=$this->Auth->user()['client_id'];

        $this->loadModel('Clients');

            $this->paginate = [
                'contain' => ['Owners', 'Clients', 'Autors']
            ];
            $dossiers = $this->paginate($this->Dossiers->find()->where(['Dossiers.active'=>1,'archive'=>0]));



        $title ='<i class="fa fa-folder-open"></i> LISTE DES DOSSIERS';


        $this->set(compact('dossiers','title'));
    }

    public function indexArchive()
    {
        $role=$this->Auth->user()['role_id'];
        $user=$this->Auth->user()['id'];
        $client=$this->Auth->user()['client_id'];

        $this->loadModel('Clients');

        $this->paginate = [
            'contain' => ['Owners', 'Clients', 'Autors']
        ];
        $dossiers = $this->paginate($this->Dossiers->find()->where(['archive'=>1]));



        $title ='<i class="fa fa-folder-open"></i> LISTE DES DOSSIERS ARCHIVES';


        $this->set(compact('dossiers','title'));
    }


    public function indexSuspended()
    {
        $role=$this->Auth->user()['role_id'];
        $user=$this->Auth->user()['id'];
        $client=$this->Auth->user()['client_id'];

        $this->loadModel('Clients');

        $this->paginate = [
            'contain' => ['Owners', 'Clients', 'Autors']
        ];
        $dossiers = $this->paginate($this->Dossiers->find()->where(['Dossiers.active'=>0]));



        $title ='<i class="fa fa-folder-open"></i> LISTE DES DOSSIERS SUSPENDUS';


        $this->set(compact('dossiers','title'));
    }

    public function archive($id){
        $dossier =$this->Dossiers->get($id);
        $dossier->archive = 1;
        $dossier=$this->Dossiers->save($dossier);

        if($dossier){
            $this->Flash->success('Archivage du dossier fait avec succes !!!');
        }

        return $this->redirect($this->referer());
    }

    public function restore($id){
        $dossier =$this->Dossiers->get($id);
        $dossier->archive = 0;
        $dossier=$this->Dossiers->save($dossier);

        if($dossier){
            $this->Flash->success('Restauration du dossier faite avec succes !!!');
        }

        return $this->redirect($this->referer());
    }

    public function disable($id){
        $dossier =$this->Dossiers->get($id);
        $dossier->active = 0;
        $dossier=$this->Dossiers->save($dossier);

        if($dossier){
            $this->Flash->success('Archivage du dossier faite avec succes !!!');
        }

        return $this->redirect($this->referer());
    }

    public function enable($id){
        $dossier =$this->Dossiers->get($id);
        $dossier->active = 1;
        $dossier=$this->Dossiers->save($dossier);

        if($dossier){
            $this->Flash->success('Archivage du dossier faite avec succes !!!');
        }

        return $this->redirect($this->referer());
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

        $dossier = $this->Dossiers->get($id, [
            'contain' => ['Autors','Plans','Clients','Owners','Produits'

                , 'Timmobilisations', 'Mfinancements','Actifs','Experts'
                ]
        ]);
        $choix = $this->Dossiers->get($id, [
            'contain' => [
                'Choices.Questions.ProduitsRisques.Risques','Choices.Questions.ProduitsRisques.Produits']
        ]);
        $choix = $choix->choices;
        $collection = new Collection($choix);
        $collection = $collection->groupBy(function($q){
            return $q->question->produits_risque->risque->name;
        });

        $choix= $collection->toArray();

        $title = '<span class="value"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;'. $dossier->name .'</span>';

        $experts = $this->Dossiers->Experts->find()->where(['role_id'=>9])->all();

        $this->set(compact('experts'));

        $this->set(compact('title','choix'));
        $this->set('dossier', $dossier);


    }







    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function link(){

        if($this->request->is('ajax')){
            $id = $this->request->getData('id');
            $d=$this->request->getData('dossier');
            $dossier = $this->Dossiers->get($d);
            $dossier->expert_id=$id;
            $dossier=$this->Dossiers->save($dossier);
            $this->set(compact('dossier'));
            $this->set('_serialize',true);
        }
    }




    ///////////////////////////////////////////////////////////////////////////////////////////

    public function ajust($id=null){

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($client=null)
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

        if($client!=null){
            $this->loadModel('Clients');
            $client = $this->Clients->get($client);
            $this->set(compact('client'));
        }


        $produits = $this->Dossiers->Produits->find()->where(['active'=>1])->all();
        $timmobilisations = $this->Dossiers->Timmobilisations->find()->all();
        $mfinancements = $this->Dossiers->Mfinancements->find()->all();
        $sectors = $this->Dossiers->Produits->Sectors->find()->all();
        $actifs=$this->Dossiers->Actifs->find()->all();
        $title ='<i class="fa fa-folder-open"></i> NOUVEAU DOSSIER';
        $this->set(compact('dossier', 'produits', 'timmobilisations', 'mfinancements','sectors','title','actifs'));
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function createPlan($id){
        $doss = $this->Dossiers->get($id,['contain'=>['Produits']]);
        $p=[];
        if(!empty($doss->produits))
            foreach($doss->produits as $prd){
                $p[]=$prd->id;
            }

        $dossier = $this->Dossiers->get($id, [
            'contain' => ['Produits.ProduitsRisques.Questions'
                ,
                'Choices.Questions']
        ]);

        $choices = $dossier->choices;
            $this->loadModel('Plans');
            $this->loadModel('Plignes');
            $this->loadModel('ProduitsRisques');
            $plan = $this->Plans->newEntity();
            $plan->dossier_id = $dossier->id;
            $plan->user_id = $this->Auth?$this->Auth->user()['id']:0;
            $plan->name = $dossier->id . date('Hdmy');
            $plan = $this->Plans->save($plan);
        $this->loadModel('Mois');
        $mois = new \DateTime();
        $mois=date_format($mois,'m');

        $moi = $this->Mois->get($mois);
        $moi->realisation_plan=$moi->realisation_plan+1;
        $moi=$this->Mois->save($moi);

            foreach($dossier->produits as $prdt){
                foreach($prdt->produits_risques as $rk){
                    $cb=$rk->frequence * $rk->gravite;
                    $quest=$rk->question;
                    if($quest!=null){
                        foreach($choices as $choice){

                            if($choice->question_id == $quest->id){
                                $c=$choice;
                            }
                        }
                        $cn=0;
                        if(!empty($c)){
                            $cn = $c->taux * $cb;
                        }
                        if($cn>=4){
                            $pl = $this->Plignes->newEntity();
                            $pl->plan_id=$plan->id;
                            $pl->pr_id=$rk->id;
                            $pl=$this->Plignes->save($pl);
                        }
                    }

                }
            }


            return $this->redirect(['controller'=>'Plans', 'action'=>'view', $plan->id]);


    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////


    public function saveJson(){
        if($this->request->is('ajax')){
            $data = $this->request->getData('dossier');
            $produits=$this->request->getData('produits');
            $mfinancements=$this->request->getData('mfinancements');
            $actifs=$this->request->getData('actifs');
            $timmobilisations=$this->request->getData('timmobilisations');
            $answers =$this->request->getData('answers');
            $dossier = $this->Dossiers->newEntity();
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
            $dossier->autor_id = $this->Auth->user()['id'];
            $dossier->representant=$data['representant'];
            $dossier->telephone=$data['telephone'];
           $dossier->mobile=$data['mobile'];
            $dossier->adresse=$data['adresse'];
           $dossier->email=$data['email'];
           // $dossier->client_id = $this->Auth
           //debug($answers); die();
            if($dossier = $this->Dossiers->save($dossier)){
                $this->loadModel('DossiersProduits');
                $this->loadModel('DossiersTimmobilisations');
                $this->loadModel('ActifsDossiers');
                $this->loadModel('DossiersMfinancements');
                $this->loadModel('Produits');
                $this->loadModel('Mois');
                $mois = new \DateTime();
                $mois=date_format($mois,'m');

                $moi = $this->Mois->get($mois);
                $moi->realisation_dossier=$moi->realisation_dossier+1;
                $moi=$this->Mois->save($moi);


                $this->loadModel('MoisSectors');
                for($i = 0; $i<count($produits);$i++){
                    $dp = $this->DossiersProduits->newEntity();
                    $dp->produit_id = $produits[$i];
                    $dp->dossier_id = $dossier->id;
                    $this->DossiersProduits->save($dp);

                    $mois = new \DateTime();
                    $mois=date_format($mois,'m');
                    $produit=$this->Produits->get($produits[$i]);
                    $ms=$this->MoisSectors->find()->where(['moi_id'=>$mois,'sector_id'=>$produit->sector_id])->first();
                    $ms->p_realisation=$ms->p_realisation+1;
                    $ms=$this->MoisSectors->save($ms);
                }

                for($i = 0; $i<count($timmobilisations);$i++){
                    $dp = $this->DossiersTimmobilisations->newEntity();
                    $dp->timmobilisation_id = $timmobilisations[$i];
                    $dp->dossier_id = $dossier->id;
                    $this->DossiersTimmobilisations->save($dp);
                }

                for($i = 0; $i<count($mfinancements);$i++){
                    $dp = $this->DossiersMfinancements->newEntity();
                    $dp->mfinancement_id = $mfinancements[$i];
                    $dp->dossier_id = $dossier->id;
                    $this->DossiersMfinancements->save($dp);
                }

                for($i = 0; $i<count($actifs);$i++){
                    $dp = $this->ActifsDossiers->newEntity();
                    $dp->actif_id = $actifs[$i];
                    $dp->dossier_id = $dossier->id;
                    $this->ActifsDossiers->save($dp);
                }

                $this->loadModel('ChoicesDossiers');
                foreach($answers as $answer){
                    $an=$this->ChoicesDossiers->newEntity();
                    $an->choice_id=$answer['choice_id'];
                    $an->dossier_id=$dossier->id;
                    $an=$this->ChoicesDossiers->save($an);
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

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
        $dossiers =  $this->paginate($this->Dossiers->find()->where(['Dossiers.client_id'=>$this->Auth->user()['client_id'],'Dossiers.active'=>1,'archive'=>0])->contain(['Owners']));
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

        $this->set(compact('title','choix'));
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
        $actifs=$this->Dossiers->Actifs->find()->all();
        $title ='<i class="fa fa-folder-open"></i> NOUVEAU DOSSIER';
        $this->set(compact('dossier', 'produits', 'timmobilisations', 'mfinancements','sectors','title','actifs'));
    }





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
            $dossier->client_id = $this->Auth->user()['client_id'];
            // debug($answers); die();
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



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function editJson(){
        if($this->request->is('ajax')){
            $data = $this->request->getData('dossier');
           // $produits=$this->request->getData('produits');
            $mfinancements=$this->request->getData('mfinancements');
            $actifs=$this->request->getData('actifs');
            $timmobilisations=$this->request->getData('timmobilisations');
           // $answers =$this->request->getData('answers');
            $dossier = $this->Dossiers->get($data['id']);
            $dossier = $this->Dossiers->patchEntity($dossier, $data);
            $dossier->autor_id = $this->Auth->user()['id'];
            $dossier->representant=$data['representant'];
            $dossier->telephone=$data['telephone'];
            $dossier->mobile=$data['mobile'];
            $dossier->adresse=$data['adresse'];
            $dossier->email=$data['email'];
            //$dossier->client_id = $this->Auth->user()['client_id'];
            // debug($answers); die();
            if($dossier = $this->Dossiers->save($dossier)){
               // $this->loadModel('DossiersProduits');
                $this->loadModel('DossiersTimmobilisations');
                $this->loadModel('ActifsDossiers');
                $this->loadModel('DossiersMfinancements');

                /*for($i = 0; $i<count($produits);$i++){
                    $dp = $this->DossiersProduits->newEntity();
                    $dp->produit_id = $produits[$i];
                    $dp->dossier_id = $dossier->id;
                    $this->DossiersProduits->save($dp);
                }*/

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


            }
            $id=$dossier->id;
            $this->set(compact('id'));
            $this->set('_serialize','id');
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
            'contain' => ['Owners','Autors','Produits.Sectors','Timmobilisations','Mfinancements','Actifs']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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
        $actifs = $this->Dossiers->Actifs->find()->all();
        $this->set(compact('dossier', 'produits', 'timmobilisations', 'mfinancements','actifs'));
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

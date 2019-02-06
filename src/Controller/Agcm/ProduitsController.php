<?php
namespace App\Controller\Agcm;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Produits Controller
 *
 * @property \App\Model\Table\ProduitsTable $Produits
 *
 * @method \App\Model\Entity\Produit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProduitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sectors']
        ];
        $produits = $this->paginate($this->Produits);

        $this->set(compact('produits'));
    }

    /**
     * View method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => ['Sectors', 'Risques', 'Dossiers']
        ]);

        $this->set('produit', $produit);
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produit = $this->Produits->newEntity();
        if ($this->request->is('post')) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('The produit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produit could not be saved. Please, try again.'));
        }
        $sectors = $this->Produits->Sectors->find()->all();
        $risques = $this->Produits->Risques->find()->all();
        $this->set(compact('produit', 'sectors', 'risques'));
    }

    public function saveJson(){

        if($this->request->is('ajax')){

            $data = $this->request->getData('donnees');
            $prod=$this->request->getData('produit');
          //  debug($prod); die();
            $produit = $this->Produits->newEntity();
            $produit->name=$prod['name'];
            $produit->sector_id=$prod['sector_id'];
            $produit->service=$prod['service']?1:0;
           // debug($produit); die();

            if($produit=$this->Produits->save($produit)){
                $this->loadModel('ProduitsRisques');
                foreach($data as $d){
                    $pr = $this->ProduitsRisques->newEntity();
                    $pr->risque_id=$d['risque_id'];
                    $pr->name=$d['name'];
                    $pr->causes=$d['causes'];
                    $pr->consequences=$d['consequences'];
                    $pr->actions=$d['actions'];
                    $pr->produit_id=$produit->id;
                    $pr->gravite=$d['gravite'];
                    $pr->frequence=$d['frequence'];
                    $this->ProduitsRisques->save($pr);
                }
            }
            $id=$produit->id;

            $this->set(compact('id'));
            $this->set('_serialize','id');
        }

    }

    public function getByIdJson(){
            //die('ok');
        if($this->request->is('ajax')){
            $id = $this->request->getData('id');

            $produits=$this->Produits->find()->where(['sector_id'=>$id])->all();

            $this->set(compact('produits'));
            $this->set('_serialize',['produits']);
        }

    }


    public function getQuestionsByIdJson(){
        if($this->request->is('ajax')){
            $id=$this->request->getData('id');

            $this->loadModel('Questions');
            $this->loadModel('ProduitsRisques');

            $prs=$this->ProduitsRisques->find()->where(['ProduitsRisques.produit_id'=>$id])->contain(['Questions.Choices','Risques'])->all();


            //  $questions=[];



            $prs=new Collection($prs);
            $questions=$prs->groupBy(function($q){
                return $q->risque->name;
            })->toArray();

            //debug($questions); die();


        }

        $this->set(compact('questions'));
        $this->set('_serialize','questions');
    }

    /**
     * Edit method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => ['Risques']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('The produit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produit could not be saved. Please, try again.'));
        }
        $sectors = $this->Produits->Sectors->find('list', ['limit' => 200]);
        $risques = $this->Produits->Risques->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'sectors', 'risques'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produit = $this->Produits->get($id);
        if ($this->Produits->delete($produit)) {
            $this->Flash->success(__('The produit has been deleted.'));
        } else {
            $this->Flash->error(__('The produit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

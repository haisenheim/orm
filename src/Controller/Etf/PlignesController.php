<?php
namespace App\Controller\Etf;

use App\Controller\AppController;

/**
 * Plignes Controller
 *
 * @property \App\Model\Table\PlignesTable $Plignes
 *
 * @method \App\Model\Entity\Pligne[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlignesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $client_id = $this->Auth->user()['client_id'];

        $this->loadModel('Dossiers');
        $dossiers = $this->Dossiers->find()->where(['Dossiers.client_id'=>$client_id,'Dossiers.active'=>1,'Dossiers.archive'=>0])->contain(['Plans']);

        $plans = [];
        foreach($dossiers as $dossier){
            if(!empty($dossier->plan)){
                $plans[]=$dossier->plan->id;
            }

        }

        $this->paginate = [
            'contain' => ['Plans.Dossiers', 'ProduitsRisques.Risques', 'ProduitsRisques.Produits', 'Pilotes'],
            'limit'=>1000
        ];


        $plignes = $this->paginate($this->Plignes->find()->where(['plan_id'=>-1]));
        if(!empty($plans))
            $plignes = $this->paginate($this->Plignes->find()->where(['plan_id in'=>$plans]));

        $this->loadModel('Produits');

        $produits = $this->Produits->find()->all();

        $this->set(compact('plignes','produits'));
    }

    /**
     * View method
     *
     * @param string|null $id Pligne id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pligne = $this->Plignes->get($id, [
            'contain' => ['Plans.Dossiers','ProduitsRisques.Risques', 'ProduitsRisques.Produits', 'Pilotes']
        ]);

        $this->set('pligne', $pligne);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pligne = $this->Plignes->newEntity();
        if ($this->request->is('post')) {
            $pligne = $this->Plignes->patchEntity($pligne, $this->request->getData());
            if ($this->Plignes->save($pligne)) {
                $this->Flash->success(__('The pligne has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pligne could not be saved. Please, try again.'));
        }
        $plans = $this->Plignes->Plans->find('list', ['limit' => 200]);
        $prs = $this->Plignes->Prs->find('list', ['limit' => 200]);
        $pilotes = $this->Plignes->Pilotes->find('list', ['limit' => 200]);
        $contributeurs = $this->Plignes->Contributeurs->find('list', ['limit' => 200]);
        $this->set(compact('pligne', 'plans', 'prs', 'pilotes', 'contributeurs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pligne id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pligne = $this->Plignes->get($id, [
            'contain' => ['ProduitsRisques.Produits','ProduitsRisques.Risques','Plans.Dossiers']
        ]);

        $client_id = $pligne->plan->dossier->owner_id;
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->getData()); die();
            $pligne = $this->Plignes->patchEntity($pligne, $this->request->getData());
            if ($this->Plignes->save($pligne)) {
                $this->Flash->success(__('The pligne has been saved.'));

                return $this->redirect(['controller'=>'Plans','action' => 'view',$pligne->plan_id]);
            }
            $this->Flash->error(__('The pligne could not be saved. Please, try again.'));
        }

        $title ='Edition des actions d\'amelioration';

        $pilotes = $this->Plignes->Pilotes->find()->where(['Pilotes.client_id'=>$client_id])->all();
        $this->set(compact('pligne', 'plans', 'prs', 'pilotes', 'contributeurs','title'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pligne id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pligne = $this->Plignes->get($id);
        if ($this->Plignes->delete($pligne)) {
            $this->Flash->success(__('The pligne has been deleted.'));
        } else {
            $this->Flash->error(__('The pligne could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

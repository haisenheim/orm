<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Plans Controller
 *
 * @property \App\Model\Table\PlansTable $Plans
 *
 * @method \App\Model\Entity\Plan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Dossiers']
        ];
        $plans = $this->paginate($this->Plans);

        $this->set(compact('plans'));
    }


    public function planifier(){

        $plans = $this->Plans->find()->contain(['mois'])->all();

        $this->set(compact('plans'));
    }


    public function perform()
    {

        if($this->request->is('ajax')){
            $sectors = $this->request->getData('sectors');
            //debug($sectors); die();
            $this->loadModel('MoisSectors');
            foreach ($sectors as $sector) {
                $ms = $this->MoisSectors->find()->where(['moi_id'=>$sector['moi_id'],'sector_id'=>$sector['sector_id']])->first();
                if(!empty($ms)){
                    if($sector['value']){
                        $ms->objectif=$sector['value'];
                        $this->MoisSectors->save($ms);
                    }

                }else{
                    $ms=$this->MoisSectors->newEntity();
                    $ms->sector_id=$sector['sector_id'];
                    $ms->moi_id = $sector['moi_id'];
                    $ms->objectif=$sector['value'];
                    $ms=$this->MoisSectors->save($ms);
                }
            }

            $this->set(compact('ms'));
            $this->set('_serialize',true);

        }

    }


    public function objectifs(){
        $this->loadModel('MoisPlans');
        $ms = $this->MoisPlans->find()->contain(['Mois','Plans'])->all();
        $col = new Collection($ms);
        $ms= $col->groupBy(function($q){
            return $q->plan->name;
        });
        $mp=$ms->toArray();
        //debug($ms); die();
        $this->set(compact('mp'));
    }





    /**
     * View method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plan = $this->Plans->get($id, [
            'contain' => ['Users', 'Dossiers.Produits', 'Plignes.ProduitsRisques','Plignes.Pilotes']
        ]);
        $this->loadModel('Parametres');
        $seuils=$this->Parametres->get(1);

        $this->loadModel('Users');
        $pilotes = $this->Users->find()->where(['client_id'=>$plan->dossier->client_id])->all();

        $title = '<i class="glyphicon glyphicon-list-alt"></i>&nbsp; PLAN D\'ACTION :<span class="value">'.$plan->name. '</span> &nbsp;&nbsp;&nbsp;<i style="color:#fff64d" class="glyphicon glyphicon-folder-open"></i> &nbsp; DOSSIER : <span class="value">' .  $plan->dossier->name.'</span>';

        $this->set(compact('pilotes','title','seuils'));

        $this->set('plan', $plan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $plan = $this->Plans->newEntity();
        if ($this->request->is('post')) {
            $plan = $this->Plans->patchEntity($plan, $this->request->getData());
            if ($this->Plans->save($plan)) {
                $this->Flash->success(__('The plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plan could not be saved. Please, try again.'));
        }
        $users = $this->Plans->Users->find('list', ['limit' => 200]);
        $dossiers = $this->Plans->Dossiers->find('list', ['limit' => 200]);
        $this->set(compact('plan', 'users', 'dossiers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plan = $this->Plans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plan = $this->Plans->patchEntity($plan, $this->request->getData());
            if ($this->Plans->save($plan)) {
                $this->Flash->success(__('The plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plan could not be saved. Please, try again.'));
        }
        $users = $this->Plans->Users->find('list', ['limit' => 200]);
        $dossiers = $this->Plans->Dossiers->find('list', ['limit' => 200]);
        $this->set(compact('plan', 'users', 'dossiers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plan = $this->Plans->get($id);
        if ($this->Plans->delete($plan)) {
            $this->Flash->success(__('The plan has been deleted.'));
        } else {
            $this->Flash->error(__('The plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

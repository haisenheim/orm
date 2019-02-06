<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Tclients Controller
 *
 * @property \App\Model\Table\TclientsTable $Tclients
 *
 * @method \App\Model\Entity\Tclient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TclientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tclients = $this->paginate($this->Tclients);

        $this->set(compact('tclients'));
    }

    /**
     * View method
     *
     * @param string|null $id Tclient id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tclient = $this->Tclients->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('tclient', $tclient);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tclient = $this->Tclients->newEntity();
        if ($this->request->is('post')) {
            $tclient = $this->Tclients->patchEntity($tclient, $this->request->getData());
            if ($this->Tclients->save($tclient)) {
                $this->Flash->success(__('The tclient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tclient could not be saved. Please, try again.'));
        }
        $this->set(compact('tclient'));
    }



    public function objectifs(){
        $this->loadModel('MoisTclients');
        $ms = $this->MoisTclients->find()->contain(['Mois','Tclients'])->all();
        $col = new Collection($ms);
        $ms= $col->groupBy(function($q){
            return $q->tclient->name;
        });
        $ms=$ms->toArray();
        //debug($ms); die();
        $this->set(compact('ms'));
    }



    public function perform()
    {

        if($this->request->is('ajax')){
            $sectors = $this->request->getData('sectors');
            //debug($sectors); die();
            $this->loadModel('MoisTclients');
            foreach ($sectors as $sector) {
                $ms = $this->MoisTclients->find()->where(['moi_id'=>$sector['moi_id'],'tclient_id'=>$sector['sector_id']])->first();
                if(!empty($ms)){
                    if($sector['value']){
                        $ms->objectif=$sector['value'];
                        $this->MoisTclients->save($ms);
                    }

                }else{
                    $ms=$this->MoisTclients->newEntity();
                    $ms->tclient_id=$sector['sector_id'];
                    $ms->moi_id = $sector['moi_id'];
                    $ms->objectif=$sector['value'];
                    $ms=$this->MoisTclients->save($ms);
                }
            }

            $this->set(compact('ms'));
            $this->set('_serialize',true);

        }

    }

    public function planifier(){

        $sectors = $this->Tclients->find()->contain(['mois'])->all();

        $this->set(compact('sectors'));
    }








    /**
     * Edit method
     *
     * @param string|null $id Tclient id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tclient = $this->Tclients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tclient = $this->Tclients->patchEntity($tclient, $this->request->getData());
            if ($this->Tclients->save($tclient)) {
                $this->Flash->success(__('The tclient has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tclient could not be saved. Please, try again.'));
        }
        $this->set(compact('tclient'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tclient id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tclient = $this->Tclients->get($id);
        if ($this->Tclients->delete($tclient)) {
            $this->Flash->success(__('The tclient has been deleted.'));
        } else {
            $this->Flash->error(__('The tclient could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

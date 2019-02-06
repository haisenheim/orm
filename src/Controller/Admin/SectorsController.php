<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Sectors Controller
 *
 * @property \App\Model\Table\SectorsTable $Sectors
 *
 * @method \App\Model\Entity\Sector[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SectorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sectors = $this->paginate($this->Sectors->find()->contain(['Produits']));

        $this->set(compact('sectors'));
    }

    /**
     * View method
     *
     * @param string|null $id Sector id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => ['Produits']
        ]);

        $this->set('sector', $sector);
    }


    public function objectifs_experts(){
        $this->loadModel('MoisSectors');
        $ms = $this->MoisSectors->find()->contain(['Mois','Sectors'])->all();
        $col = new Collection($ms);
        $ms= $col->groupBy(function($q){
            return $q->sector->name;
        });
        $ms=$ms->toArray();
        //debug($ms); die();
        $this->set(compact('ms'));
    }



    public function perform($id = null)
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

    public function projecter(){

        $sectors = $this->Sectors->find()->contain(['mois'])->all();

        $this->set(compact('sectors'));
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sector = $this->Sectors->newEntity();
        if ($this->request->is('post')) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->getData());
            if ($this->Sectors->save($sector)) {
                $this->Flash->success(__('The sector has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sector could not be saved. Please, try again.'));
        }
        $this->set(compact('sector'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sector id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sector = $this->Sectors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sector = $this->Sectors->patchEntity($sector, $this->request->getData());
            if ($this->Sectors->save($sector)) {
                $this->Flash->success(__('The sector has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sector could not be saved. Please, try again.'));
        }
        $this->set(compact('sector'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sector id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sector = $this->Sectors->get($id);
        if ($this->Sectors->delete($sector)) {
            $this->Flash->success(__('The sector has been deleted.'));
        } else {
            $this->Flash->error(__('The sector could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

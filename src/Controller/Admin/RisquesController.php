<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Risques Controller
 *
 * @property \App\Model\Table\RisquesTable $Risques
 *
 * @method \App\Model\Entity\Risque[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RisquesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $risques = $this->paginate($this->Risques);

        $this->set(compact('risques'));
    }

    /**
     * View method
     *
     * @param string|null $id Risque id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $risque = $this->Risques->get($id, [
            'contain' => []
        ]);

        $this->set('risque', $risque);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $risque = $this->Risques->newEntity();
        if ($this->request->is('post')) {
            $risque = $this->Risques->patchEntity($risque, $this->request->getData());
            if ($this->Risques->save($risque)) {
                $this->Flash->success(__('The risque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The risque could not be saved. Please, try again.'));
        }
        $produits = $this->Risques->Produits->find('list', ['limit' => 200]);
        $this->set(compact('risque', 'produits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Risque id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $risque = $this->Risques->get($id, [
            'contain' => ['Produits']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $risque = $this->Risques->patchEntity($risque, $this->request->getData());
            if ($this->Risques->save($risque)) {
                $this->Flash->success(__('The risque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The risque could not be saved. Please, try again.'));
        }
        $produits = $this->Risques->Produits->find('list', ['limit' => 200]);
        $this->set(compact('risque', 'produits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Risque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $risque = $this->Risques->get($id);
        if ($this->Risques->delete($risque)) {
            $this->Flash->success(__('The risque has been deleted.'));
        } else {
            $this->Flash->error(__('The risque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller\Expert;

use App\Controller\AppController;

/**
 * ProduitsRisques Controller
 *
 * @property \App\Model\Table\ProduitsRisquesTable $ProduitsRisques
 *
 * @method \App\Model\Entity\ProduitsRisque[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProduitsRisquesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produits', 'Risques']
        ];
        $produitsRisques = $this->paginate($this->ProduitsRisques);

        $this->set(compact('produitsRisques'));
    }

    /**
     * View method
     *
     * @param string|null $id Produits Risque id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produitsRisque = $this->ProduitsRisques->get($id, [
            'contain' => ['Produits', 'Risques']
        ]);

        $this->set('produitsRisque', $produitsRisque);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produitsRisque = $this->ProduitsRisques->newEntity();
        if ($this->request->is('post')) {
            $produitsRisque = $this->ProduitsRisques->patchEntity($produitsRisque, $this->request->getData());
            if ($this->ProduitsRisques->save($produitsRisque)) {
                $this->Flash->success(__('The produits risque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produits risque could not be saved. Please, try again.'));
        }
        $produits = $this->ProduitsRisques->Produits->find('list', ['limit' => 200]);
        $risques = $this->ProduitsRisques->Risques->find('list', ['limit' => 200]);
        $this->set(compact('produitsRisque', 'produits', 'risques'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produits Risque id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produitsRisque = $this->ProduitsRisques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produitsRisque = $this->ProduitsRisques->patchEntity($produitsRisque, $this->request->getData());
            if ($this->ProduitsRisques->save($produitsRisque)) {
                $this->Flash->success(__('The produits risque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The produits risque could not be saved. Please, try again.'));
        }
        $produits = $this->ProduitsRisques->Produits->find('list', ['limit' => 200]);
        $risques = $this->ProduitsRisques->Risques->find('list', ['limit' => 200]);
        $this->set(compact('produitsRisque', 'produits', 'risques'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Produits Risque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produitsRisque = $this->ProduitsRisques->get($id);
        if ($this->ProduitsRisques->delete($produitsRisque)) {
            $this->Flash->success(__('The produits risque has been deleted.'));
        } else {
            $this->Flash->error(__('The produits risque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

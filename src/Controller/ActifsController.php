<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Actifs Controller
 *
 * @property \App\Model\Table\ActifsTable $Actifs
 *
 * @method \App\Model\Entity\Actif[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActifsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $actifs = $this->paginate($this->Actifs);

        $this->set(compact('actifs'));
    }

    /**
     * View method
     *
     * @param string|null $id Actif id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actif = $this->Actifs->get($id, [
            'contain' => ['Dossiers']
        ]);

        $this->set('actif', $actif);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actif = $this->Actifs->newEntity();
        if ($this->request->is('post')) {
            $actif = $this->Actifs->patchEntity($actif, $this->request->getData());
            if ($this->Actifs->save($actif)) {
                $this->Flash->success(__('The actif has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actif could not be saved. Please, try again.'));
        }
        $dossiers = $this->Actifs->Dossiers->find('list', ['limit' => 200]);
        $this->set(compact('actif', 'dossiers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actif id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actif = $this->Actifs->get($id, [
            'contain' => ['Dossiers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actif = $this->Actifs->patchEntity($actif, $this->request->getData());
            if ($this->Actifs->save($actif)) {
                $this->Flash->success(__('The actif has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actif could not be saved. Please, try again.'));
        }
        $dossiers = $this->Actifs->Dossiers->find('list', ['limit' => 200]);
        $this->set(compact('actif', 'dossiers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actif id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actif = $this->Actifs->get($id);
        if ($this->Actifs->delete($actif)) {
            $this->Flash->success(__('The actif has been deleted.'));
        } else {
            $this->Flash->error(__('The actif could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

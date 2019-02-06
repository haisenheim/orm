<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DossiersMfinancements Controller
 *
 * @property \App\Model\Table\DossiersMfinancementsTable $DossiersMfinancements
 *
 * @method \App\Model\Entity\DossiersMfinancement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DossiersMfinancementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dossiers', 'Mfinancements']
        ];
        $dossiersMfinancements = $this->paginate($this->DossiersMfinancements);

        $this->set(compact('dossiersMfinancements'));
    }

    /**
     * View method
     *
     * @param string|null $id Dossiers Mfinancement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dossiersMfinancement = $this->DossiersMfinancements->get($id, [
            'contain' => ['Dossiers', 'Mfinancements']
        ]);

        $this->set('dossiersMfinancement', $dossiersMfinancement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dossiersMfinancement = $this->DossiersMfinancements->newEntity();
        if ($this->request->is('post')) {
            $dossiersMfinancement = $this->DossiersMfinancements->patchEntity($dossiersMfinancement, $this->request->getData());
            if ($this->DossiersMfinancements->save($dossiersMfinancement)) {
                $this->Flash->success(__('The dossiers mfinancement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossiers mfinancement could not be saved. Please, try again.'));
        }
        $dossiers = $this->DossiersMfinancements->Dossiers->find('list', ['limit' => 200]);
        $mfinancements = $this->DossiersMfinancements->Mfinancements->find('list', ['limit' => 200]);
        $this->set(compact('dossiersMfinancement', 'dossiers', 'mfinancements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dossiers Mfinancement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dossiersMfinancement = $this->DossiersMfinancements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dossiersMfinancement = $this->DossiersMfinancements->patchEntity($dossiersMfinancement, $this->request->getData());
            if ($this->DossiersMfinancements->save($dossiersMfinancement)) {
                $this->Flash->success(__('The dossiers mfinancement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossiers mfinancement could not be saved. Please, try again.'));
        }
        $dossiers = $this->DossiersMfinancements->Dossiers->find('list', ['limit' => 200]);
        $mfinancements = $this->DossiersMfinancements->Mfinancements->find('list', ['limit' => 200]);
        $this->set(compact('dossiersMfinancement', 'dossiers', 'mfinancements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dossiers Mfinancement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dossiersMfinancement = $this->DossiersMfinancements->get($id);
        if ($this->DossiersMfinancements->delete($dossiersMfinancement)) {
            $this->Flash->success(__('The dossiers mfinancement has been deleted.'));
        } else {
            $this->Flash->error(__('The dossiers mfinancement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

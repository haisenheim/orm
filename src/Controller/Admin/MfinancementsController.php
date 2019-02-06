<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Mfinancements Controller
 *
 * @property \App\Model\Table\MfinancementsTable $Mfinancements
 *
 * @method \App\Model\Entity\Mfinancement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MfinancementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $mfinancements = $this->paginate($this->Mfinancements);

        $this->set(compact('mfinancements'));
    }

    /**
     * View method
     *
     * @param string|null $id Mfinancement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mfinancement = $this->Mfinancements->get($id, [
            'contain' => ['Dossiers']
        ]);

        $this->set('mfinancement', $mfinancement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mfinancement = $this->Mfinancements->newEntity();
        if ($this->request->is('post')) {
            $mfinancement = $this->Mfinancements->patchEntity($mfinancement, $this->request->getData());
            if ($this->Mfinancements->save($mfinancement)) {
                $this->Flash->success(__('The mfinancement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mfinancement could not be saved. Please, try again.'));
        }
        $this->set(compact('mfinancement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mfinancement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mfinancement = $this->Mfinancements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mfinancement = $this->Mfinancements->patchEntity($mfinancement, $this->request->getData());
            if ($this->Mfinancements->save($mfinancement)) {
                $this->Flash->success(__('The mfinancement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mfinancement could not be saved. Please, try again.'));
        }
        $this->set(compact('mfinancement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mfinancement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mfinancement = $this->Mfinancements->get($id);
        if ($this->Mfinancements->delete($mfinancement)) {
            $this->Flash->success(__('The mfinancement has been deleted.'));
        } else {
            $this->Flash->error(__('The mfinancement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

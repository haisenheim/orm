<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Timmobilisations Controller
 *
 * @property \App\Model\Table\TimmobilisationsTable $Timmobilisations
 *
 * @method \App\Model\Entity\Timmobilisation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimmobilisationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $timmobilisations = $this->paginate($this->Timmobilisations);

        $this->set(compact('timmobilisations'));
    }

    /**
     * View method
     *
     * @param string|null $id Timmobilisation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timmobilisation = $this->Timmobilisations->get($id, [
            'contain' => ['Dossiers']
        ]);

        $this->set('timmobilisation', $timmobilisation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timmobilisation = $this->Timmobilisations->newEntity();
        if ($this->request->is('post')) {
            $timmobilisation = $this->Timmobilisations->patchEntity($timmobilisation, $this->request->getData());
            if ($this->Timmobilisations->save($timmobilisation)) {
                $this->Flash->success(__('The timmobilisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timmobilisation could not be saved. Please, try again.'));
        }
        $this->set(compact('timmobilisation'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Timmobilisation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timmobilisation = $this->Timmobilisations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timmobilisation = $this->Timmobilisations->patchEntity($timmobilisation, $this->request->getData());
            if ($this->Timmobilisations->save($timmobilisation)) {
                $this->Flash->success(__('The timmobilisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timmobilisation could not be saved. Please, try again.'));
        }
        $this->set(compact('timmobilisation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Timmobilisation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timmobilisation = $this->Timmobilisations->get($id);
        if ($this->Timmobilisations->delete($timmobilisation)) {
            $this->Flash->success(__('The timmobilisation has been deleted.'));
        } else {
            $this->Flash->error(__('The timmobilisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

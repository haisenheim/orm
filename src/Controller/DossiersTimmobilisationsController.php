<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DossiersTimmobilisations Controller
 *
 * @property \App\Model\Table\DossiersTimmobilisationsTable $DossiersTimmobilisations
 *
 * @method \App\Model\Entity\DossiersTimmobilisation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DossiersTimmobilisationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dossiers', 'Timmobilisations']
        ];
        $dossiersTimmobilisations = $this->paginate($this->DossiersTimmobilisations);

        $this->set(compact('dossiersTimmobilisations'));
    }

    /**
     * View method
     *
     * @param string|null $id Dossiers Timmobilisation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dossiersTimmobilisation = $this->DossiersTimmobilisations->get($id, [
            'contain' => ['Dossiers', 'Timmobilisations']
        ]);

        $this->set('dossiersTimmobilisation', $dossiersTimmobilisation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dossiersTimmobilisation = $this->DossiersTimmobilisations->newEntity();
        if ($this->request->is('post')) {
            $dossiersTimmobilisation = $this->DossiersTimmobilisations->patchEntity($dossiersTimmobilisation, $this->request->getData());
            if ($this->DossiersTimmobilisations->save($dossiersTimmobilisation)) {
                $this->Flash->success(__('The dossiers timmobilisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossiers timmobilisation could not be saved. Please, try again.'));
        }
        $dossiers = $this->DossiersTimmobilisations->Dossiers->find('list', ['limit' => 200]);
        $timmobilisations = $this->DossiersTimmobilisations->Timmobilisations->find('list', ['limit' => 200]);
        $this->set(compact('dossiersTimmobilisation', 'dossiers', 'timmobilisations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dossiers Timmobilisation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dossiersTimmobilisation = $this->DossiersTimmobilisations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dossiersTimmobilisation = $this->DossiersTimmobilisations->patchEntity($dossiersTimmobilisation, $this->request->getData());
            if ($this->DossiersTimmobilisations->save($dossiersTimmobilisation)) {
                $this->Flash->success(__('The dossiers timmobilisation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dossiers timmobilisation could not be saved. Please, try again.'));
        }
        $dossiers = $this->DossiersTimmobilisations->Dossiers->find('list', ['limit' => 200]);
        $timmobilisations = $this->DossiersTimmobilisations->Timmobilisations->find('list', ['limit' => 200]);
        $this->set(compact('dossiersTimmobilisation', 'dossiers', 'timmobilisations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dossiers Timmobilisation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dossiersTimmobilisation = $this->DossiersTimmobilisations->get($id);
        if ($this->DossiersTimmobilisations->delete($dossiersTimmobilisation)) {
            $this->Flash->success(__('The dossiers timmobilisation has been deleted.'));
        } else {
            $this->Flash->error(__('The dossiers timmobilisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

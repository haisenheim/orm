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
class ActifsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $timmobilisations = $this->paginate($this->Actifs);

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
                $this->Flash->success(__('Enregistrement fait avec succes !!!'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Echec !!!'));
        }
        $this->set(compact('actif'));
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
        $actif = $this->Actifs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actif = $this->Actifs->patchEntity($actif, $this->request->getData());
            if ($this->Actifs->save($actif)) {
                $this->Flash->success(__('Modification faite avec succes.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Echec.'));
        }
        $this->set(compact('actif'));
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
        $timmobilisation = $this->Actifs->get($id);
        if ($this->Actifs->delete($timmobilisation)) {
            $this->Flash->success(__('The timmobilisation has been deleted.'));
        } else {
            $this->Flash->error(__('The timmobilisation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

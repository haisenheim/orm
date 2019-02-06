<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Defaillances Controller
 *
 * @property \App\Model\Table\DefaillancesTable $Defaillances
 *
 * @method \App\Model\Entity\Defaillance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DefaillancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Risques', 'Causes']
        ];
        $defaillances = $this->paginate($this->Defaillances);

        $this->set(compact('defaillances'));
    }

    /**
     * View method
     *
     * @param string|null $id Defaillance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $defaillance = $this->Defaillances->get($id, [
            'contain' => ['Risques', 'Causes']
        ]);

        $this->set('defaillance', $defaillance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $defaillance = $this->Defaillances->newEntity();
        if ($this->request->is('post')) {
            $defaillance = $this->Defaillances->patchEntity($defaillance, $this->request->getData());
            if ($this->Defaillances->save($defaillance)) {
                $this->Flash->success(__('The defaillance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defaillance could not be saved. Please, try again.'));
        }
        $risques = $this->Defaillances->Risques->find('list', ['limit' => 200]);
        $causes = $this->Defaillances->Causes->find('list', ['limit' => 200]);
        $this->set(compact('defaillance', 'risques', 'causes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Defaillance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $defaillance = $this->Defaillances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $defaillance = $this->Defaillances->patchEntity($defaillance, $this->request->getData());
            if ($this->Defaillances->save($defaillance)) {
                $this->Flash->success(__('The defaillance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defaillance could not be saved. Please, try again.'));
        }
        $risques = $this->Defaillances->Risques->find('list', ['limit' => 200]);
        $causes = $this->Defaillances->Causes->find('list', ['limit' => 200]);
        $this->set(compact('defaillance', 'risques', 'causes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Defaillance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $defaillance = $this->Defaillances->get($id);
        if ($this->Defaillances->delete($defaillance)) {
            $this->Flash->success(__('The defaillance has been deleted.'));
        } else {
            $this->Flash->error(__('The defaillance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller\Expert;

use App\Controller\AppController;

/**
 * Choices Controller
 *
 * @property \App\Model\Table\ChoicesTable $Choices
 *
 * @method \App\Model\Entity\Choice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions']
        ];
        $choices = $this->paginate($this->Choices);

        $this->set(compact('choices'));
    }

    /**
     * View method
     *
     * @param string|null $id Choice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $choice = $this->Choices->get($id, [
            'contain' => ['Questions', 'Answers']
        ]);

        $this->set('choice', $choice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $choice = $this->Choices->newEntity();
        if ($this->request->is('post')) {
            $choice = $this->Choices->patchEntity($choice, $this->request->getData());
            if ($this->Choices->save($choice)) {
                $this->Flash->success(__('The choice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The choice could not be saved. Please, try again.'));
        }
        $questions = $this->Choices->Questions->find('list', ['limit' => 200]);
        $this->set(compact('choice', 'questions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Choice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $choice = $this->Choices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $choice = $this->Choices->patchEntity($choice, $this->request->getData());
            if ($this->Choices->save($choice)) {
                $this->Flash->success(__('The choice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The choice could not be saved. Please, try again.'));
        }
        $questions = $this->Choices->Questions->find('list', ['limit' => 200]);
        $this->set(compact('choice', 'questions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Choice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $choice = $this->Choices->get($id);
        if ($this->Choices->delete($choice)) {
            $this->Flash->success(__('The choice has been deleted.'));
        } else {
            $this->Flash->error(__('The choice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

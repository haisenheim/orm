<?php
namespace App\Controller\Expert;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Risques','Produits']
        ];
        $questions = $this->paginate($this->Questions);

        $this->set(compact('questions'));
    }


    public function browse($pr, $riq)
    {
        $this->loadModel('Produits');
        $this->loadModel('Risques');
        $produit = $this->Produits->get($pr);
        $risque = $this->Risques->get($riq);
        $questions = $this->paginate($this->Questions->find()->where(['produit_id'=>$pr, 'risque_id'=>$riq]));

        $this->set(compact('questions','produit','risque'));
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Risques', 'Produits', 'Choices']
        ]);

        $this->set('question', $question);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $risques = $this->Questions->Risques->find()->all();
        $produits = $this->Questions->Produits->find()->all();
        $this->set(compact('question', 'risques','produits'));
    }

    public function create($p,$r)
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $risque = $this->Questions->Risques->get($r);
        $produit = $this->Questions->Produits->get($p);
        $this->set(compact('question', 'risque','produit'));
    }


    public function saveJson(){

        if($this->request->is('ajax')){
            $data = $this->request->getData('donnees');
            $quest=$this->request->getData('question');
            //  debug($prod); die();
            $question = $this->Questions->newEntity();
            $question->name=$quest['name'];
            $question->risque_id=$quest['risque_id'];
            $question->produit_id=$quest['produit_id'];


            if($question=$this->Questions->save($question)){
                $this->loadModel('Choices');
                foreach($data as $d){
                    $pr = $this->Choices->newEntity();
                    $pr->question_id=$question->id;
                    $pr->taux=$d['coef'];
                    $pr->name=$d['choice'];
                    $this->Choices->save($pr);
                }
            }
            $id=$question->id;

            $this->set(compact('id'));
            $this->set('_serialize','id');
        }

    }



    public function editJson(){

        if($this->request->is('ajax')){
            $data = $this->request->getData('donnees');
            $quest=$this->request->getData('question');
            //  debug($prod); die();
            $question = $this->Questions->get($quest['id']);
            $question->name=$quest['name'];
            $question->risque_id=$quest['risque_id'];
            $question->produit_id=$quest['produit_id'];


            if($question=$this->Questions->save($question)){
                $this->loadModel('Choices');
                if ($this->Choices->deleteAll(['question_id'=>$question->id])){
                    foreach($data as $d){
                        $pr = $this->Choices->newEntity();
                        $pr->question_id=$question->id;
                        $pr->taux=$d['coef'];
                        $pr->name=$d['choice'];
                        $this->Choices->save($pr);
                    }
                }
            }
            $id=$question->id;

            $this->set(compact('id'));
            $this->set('_serialize','id');
        }

    }





    public function createJson(){

        if($this->request->is('ajax')){
            $data = $this->request->getData('donnees');
            $quest=$this->request->getData('question');

            //  debug($prod); die();
            $question = $this->Questions->newEntity();
            $question->name=$quest['name'];
            $question->risque_id=$quest['risque_id'];
            $question->produit_id=$quest['produit_id'];


            if($question=$this->Questions->save($question)){
                $this->loadModel('Choices');
                foreach($data as $d){
                    $pr = $this->Choices->newEntity();
                    $pr->question_id=$question->id;
                    $pr->taux=$d['coef'];
                    $pr->name=$d['choice'];
                    $this->Choices->save($pr);
                }
            }
            $id=$question->id;

            $this->set(compact('id'));
            $this->set('_serialize','id');
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Choices','Risques','Produits']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $risques = $this->Questions->Risques->find()->all();
        $produits=$this->Questions->Produits->find()->all();
        $this->set(compact('question', 'risques','produits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

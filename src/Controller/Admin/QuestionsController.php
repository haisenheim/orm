<?php
namespace App\Controller\Admin;

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

        $questions = $this->Questions->find()->contain(['ProduitsRisques.Produits','ProduitsRisques.Risques'])->all();

        $this->set(compact('questions'));
    }


    public function browse($pr)
    {
        $this->loadModel('ProduitsRisques');

        $defaillance = $this->ProduitsRisques->get($pr,['contain'=>['Produits','Risques','Questions.Choices']]);


        $this->set(compact('defaillance'));
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
            'contain' => ['ProduitsRisques.Produits','ProduitsRisques.Risques', 'Choices']
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

        $this->loadModel('Risques');
        $this->loadModel('Produits');
        $risques = $this->Risques->find()->all();
        $produits = $this->Produits->find()->all();
        $this->set(compact('question', 'risques','produits'));
    }


    public function create($id){
        $this->loadModel('ProduitsRisques');
        $pr=$this->ProduitsRisques->get($id,['contain'=>['Produits','Risques']]);
        $this->set(compact('pr'));
    }



    public function getDefaillances(){

        if($this->request->is('ajax')){
            $produit_id = $this->request->getData('produit_id');
            $risque_id = $this->request->getData('risque_id');

            $this->loadModel('ProduitsRisques');

            $defaillances = $this->ProduitsRisques->find()->where(['produit_id'=>$produit_id,'risque_id'=>$risque_id])->all();

            $this->set(compact('defaillances'));
            $this->set('_serialize',true);
        }
    }






    public function saveJson(){

        if($this->request->is('ajax')){
            $data = $this->request->getData('donnees');
            $quest=$this->request->getData('question');
            //  debug($prod); die();
            $question = $this->Questions->newEntity();
            $question->name=$quest['name'];
            $question->pr_id=$quest['pr_id'];


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
            $question->pr_id=$quest['pr_id'];

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
            'contain' => ['Choices','ProduitsRisques']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
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

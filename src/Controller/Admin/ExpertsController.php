<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpertsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function beforeFilter(Event $event){
        $this->loadModel('Users');
        parent::beforeRender($event);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Nations','Sectors']
        ];

        $users = $this->paginate($this->Users->find()->where(['role_id'=>9]));

        $this->set(compact('users'));
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function disable($id){
        $client=$this->Users->get($id);
        $client->active=0;
        $client=$this->Users->save($client);
        if($client){
            $this->Flash->success('Blocage fait avec succes !!!');
            return $this->redirect(['action'=>'index']);
        }

        $this->Flash->error('Echec au moment de la desactivation !!!');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function enable($id){
        $client=$this->Users->get($id);
        $client->active=1;
        $client=$this->Users->save($client);
        if($client){
            $this->Flash->success('Deblocage fait avec succes !!!');
            return $this->redirect(['action'=>'index']);
        }

        $this->Flash->error('Echec au moment de la Reactivation !!!');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Nations', 'Sectors']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
           // debug($this->request->getData()); die();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->sector_id=$this->request->getData('sector_id');
            $user->nation_id=$this->request->getData('nation_id');
            $user->ville=$this->request->getData('ville');
            $user->date_recrut=$this->request->getData('date_recrut');
            $user->created = new \DateTime();
            $user->role_id=9;
            if ($this->Users->save($user)) {
                $this->loadModel('MoisSectors');

                $mois = new \DateTime($this->request->getData('date_recrut'));
                $mois=date_format($mois,'m');
                $ms=$this->MoisSectors->find()->where(['moi_id'=>$mois,'sector_id'=>$this->request->getData('sector_id')])->first();
                $ms->realisation=$ms->realisation+1;
                $ms=$this->MoisSectors->save($ms);
                $this->Flash->success(__('Enregistrement fait avec succes !!!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Une erreur est survenue lors de l\'enregistrement de l\'utilisateur.'));
        }
        $nations = $this->Users->Nations->find()->all();
        $secteurs = $this->Users->Sectors->find()->all();
        $this->set(compact('user', 'nations', 'secteurs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Sectors','Nations']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->nation_id=$this->request->getData('nation_id');
            $user->ville=$this->request->getData('ville');
            $user->role_id=9;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $nations = $this->Users->Nations->find()->all();
        $secteurs = $this->Users->Sectors->find()->all();
        $this->set(compact('user', 'nations', 'secteurs'));
    }







    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Suppression faite avec succes !!!.'));
        } else {
            $this->Flash->error(__('Une erreur est survenue lors de la suppression.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

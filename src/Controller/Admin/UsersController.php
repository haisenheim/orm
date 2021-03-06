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
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Clients']
        ];
        if($this->Auth->user()['role_id']==1){
            $users = $this->paginate($this->Users);
        }else{
            $users = $this->paginate($this->Users->find()->where(['users.client_id'=>$this->Auth->user()['client_id']]));
        }


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
            'contain' => ['Roles', 'Clients']
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
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id=1;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Enregistrement fait avec succes !!!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Une erreur est survenue lors de l\'enregistrement de l\'utilisateur.'));
        }
        $roles = $this->Users->Roles->find()->all();
        $this->set(compact('user', 'roles'));
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
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $clients = $this->Users->Clients->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'clients'));
    }



    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->getEventManager()->off($this->Csrf);
        $this->Auth->allow(['add', 'index','login','logout']);
    }

    public function login()
    {
        if ($this->request->is('post')){
            $user = $this->Auth->identify();
            if ($user){
                $us=$this->Users->get($user['id']);
                $this->loadModel('Sessions');
                $session = $this->Sessions->newEntity();
                $session->user_id=$us->id;
                $this->loadModel('Mois');
                $moi=$this->Mois->find()->where(['abb'=>date_format(new \DateTime(),'m')])->first();
                $this->loadModel('Annees');
                $an=$this->Annees->find()->where(['name'=>date_format(new \DateTime(),'Y')])->first();
                $session->annee_id=$an->id;
                $session->moi_id=$moi->id;
                $session->login= new \DateTime();
                $session = $this->Sessions->save($session);
                $user['session']=$session;
                $this->Auth->setUser($user);
                $us->login_count=$us->login_count+1;
                $us->last_connexion=new \DateTime();
                $this->Users->save($us);
                return $this->redirect($this->Auth->redirectUrl());
            }else
                $this->Flash->error('Nom d\'utilisateur ou mot de passe incorect.',[
                    'key' => 'auth'
                ]);
        }



    }


    public function logout()
    {
        $session = $this->Auth->user()['session'];

        if(!empty($session)){
            $this->loadModel('Sessions');
            $session = $this->Sessions->get($session->id);
            $session->logout=new \DateTime();
        }

        $this->Sessions->save($session);
        $this->Flash->success('Vous êtes maintenant déconnecté.');
        return $this->redirect($this->Auth->logout());
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

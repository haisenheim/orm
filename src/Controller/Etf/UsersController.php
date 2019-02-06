<?php
namespace App\Controller\Etf;

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

        $users = $this->paginate($this->Users->find()->where(['Users.client_id'=>$this->Auth->user()['client_id']]));

        $this->set(compact('users'));
    }

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
            $user->client_id=$this->Auth->user()['client_id'];
            $user->role_id=7;
            $user->active=1;

            if($user=$this->Users->save($user)){
                $this->Flash->success(__('L\'utilisateur  a egalement ete cree !!!'));
                if(!empty($this->request->getData('imageUri')['name'])){
                    $file = $this->request->getData('imageUri');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'users')){
                            mkdir(WWW_ROOT.'img'.DS.'users');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext);
                        }
                        $name = $user->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'users'.DS.$name.'.'.$ext);
                        $user->imageUri = 'users/'.$name.'.'.$ext;
                        $this->Users->save($user);
                    }
                }
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error('La creation de l\'utilisateur a echoue !!!');
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
    public function edit()
    {
        $id=$this->Auth->user()['id'];
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($user=$this->Users->save($user)){
                $this->Flash->success(__('Votre profil a ete mis a jour !!!'));
                if(!empty($this->request->getData('imageUri')['name'])){
                    $file = $this->request->getData('imageUri');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'users')){
                            mkdir(WWW_ROOT.'img'.DS.'users');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext);
                        }
                        $name = $user->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'users'.DS.$name.'.'.$ext);
                        $user->imageUri = 'users/'.$name.'.'.$ext;
                        $this->Users->save($user);
                    }
                }
                return $this->redirect(['action'=>'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }



    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->getEventManager()->off($this->Csrf);
        $this->Auth->allow(['login','logout']);
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

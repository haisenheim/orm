<?php
namespace App\Controller\Admincm;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $role=$this->Auth->user()['role_id'];
        $user = $this->Auth->user()['id'];
        $client=$this->Auth->user()['client_id'];
        $this->paginate = [
            'contain' => ['Tclients']
        ];

        $title = '<i class="fa fa-user-friends"></i> LISTE DES CLIENTS';

        $clients = $this->paginate($this->Clients->find()->where(['client_id'=>$client,'tclient_id'=>2]));
        $this->set(compact('clients','title'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Tclients', 'Users','Dossiers']
        ]);

        $title = 'FICHE CLIENT : <span class="value">'.$client->name.'</span>';


        $dossiers = $client->dossiers;
        $this->set(compact('dossiers','title'));
        $this->set('client', $client);
    }


    public function search(){

        $client = $this->Clients->find()->where(['code'=>$this->request->getData('code')])->first();

        $this->set(compact('client'));
        $this->set('_serialize',true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $user =$this->loadModel('Users');
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $client->tclient_id=3;
            $client->client_id=$this->Auth->user()['client_id'];
            if ($client=$this->Clients->save($client)) {
                $this->Flash->success(__('Le client a ete cree !!!.'));
                if(!empty($this->request->getData('photo')['name'])){
                    $file = $this->request->getData('photo');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'clients')){
                            mkdir(WWW_ROOT.'img'.DS.'clients');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'clients'.DS.$client->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'clients'.DS.$client->id.'.'.$ext);
                        }
                        $name = $client->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'clients'.DS.$name.'.'.$ext);
                        $client->imageUri = 'clients/'.$name.'.'.$ext;
                        $this->Clients->save($client);
                    }
                }
                $user=$this->Users->newEntity();
                $user->last_name=$this->request->getData('last_name');
                $user->first_name=$this->request->getData('first_name');
                $user->phone=$this->request->getData('user_phone');
                $user->password=$this->request->getData('password');
                $user->client_id=$client->id;
                $user->email=$this->request->getData('user_email');
                $user->address=$this->request->getData('user_address');
                $user->active=1;
                $user->role_id=3;
                if($user=$this->Users->save($user)){
                    $this->Flash->success(__('L\'utilisateur administrateur a egalement ete cree !!!'));
                    if(!empty($this->request->getData('user_photo')['name'])){
                        $file = $this->request->getData('user_photo');
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

                }else{
                    $this->Flash->error('La creation de l\'utilisateur a echoue !!!');
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erreur lors de l\'enregistrement du Client !!!!.'));
        }
        $tclients = $this->Clients->Tclients->find()->all();
        $this->set(compact('client', 'tclients','user'));
    }

    public function create()
    {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $user =$this->loadModel('Users');
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $client->tclient_id=2;
            $client->code=date_format(date_create(),'ymhisd');
            $client->client_id=$this->Auth->user()['client_id'];
           // debug($this->request->getData()); die();
            if ($client=$this->Clients->save($client)) {
                $this->Flash->success(__('Le client a ete cree !!!.'));
                if(!empty($this->request->getData('photo')['name'])){
                    $file = $this->request->getData('photo');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'clients')){
                            mkdir(WWW_ROOT.'img'.DS.'clients');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'clients'.DS.$client->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'clients'.DS.$client->id.'.'.$ext);
                        }
                        $name = $client->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'clients'.DS.$name.'.'.$ext);
                        $client->imageUri = 'clients/'.$name.'.'.$ext;
                        $this->Clients->save($client);
                    }
                }
                $user=$this->Users->newEntity();
                $user->last_name=$this->request->getData('last_name');
                $user->first_name=$this->request->getData('first_name');
                $user->phone=$this->request->getData('user_phone');
                $user->password=$this->request->getData('password');
                $user->client_id=$client->id;
                $user->email=$this->request->getData('user_email');
                $user->address=$this->request->getData('user_address');
                $user->active=1;
                $user->role_id=3;
                if($user=$this->Users->save($user)){
                    $this->Flash->success(__('L\'utilisateur administrateur a egalement ete cree !!!'));
                    if(!empty($this->request->getData('user_photo')['name'])){
                        $file = $this->request->getData('user_photo');
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
                }else{
                    $this->Flash->error('La creation de l\'utilisateur a echoue !!!');
                }
                return $this->redirect(['controller'=>'Dossiers','action' => 'add',$client->id]);
            }
            $this->Flash->error(__('Erreur lors de l\'enregistrement du Client !!!!.'));
        }
        $title = 'ENREGISTREMENT NOUVEAU CLIENT';
        $this->set(compact('client', 'tclients','user','title'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $id=$this->Auth->user()['client_id'];
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //debug($this->request->getData()); die();
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            $client->footer_color=$this->request->getData('footer_color');
            $client->header_color=$this->request->getData('header_color');
            $client->title_color=$this->request->getData('title_color');
            $client->rccm=$this->request->getData('rccm');
            $client->slogan=$this->request->getData('slogan');
            $client->capital=$this->request->getData('capital');
            $client->phone=$this->request->getData('phone');
            $client->email=$this->request->getData('email');
            $client->name=$this->request->getData('name');
            $client->address=$this->request->getData('address');
            if($client=$this->Clients->save($client)){
                $this->Flash->success(__('Votre compte a ete mis a jour avec succes!!!'));
                if(!empty($this->request->getData('imageUri')['name'])){
                    $file = $this->request->getData('imageUri');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'clients')){
                            mkdir(WWW_ROOT.'img'.DS.'clients');
                        }
                        if(!file_exists(WWW_ROOT.'img'.DS.'clients'.DS.'logos')){
                            mkdir(WWW_ROOT.'img'.DS.'clients'.DS.'logos');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'clients'.DS.'logos'.DS.$client->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'clients'.DS.DS.'logos'.$client->id.'.'.$ext);
                        }
                        $name = $client->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'clients'.DS.'logos'.DS.$name.'.'.$ext);
                        $client->imageUri = 'clients/logos/'.$name.'.'.$ext;
                        $this->Clients->save($client);
                    }
                }

                if(!empty($this->request->getData('bg_img')['name'])){
                    $file = $this->request->getData('bg_img');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'clients')){
                            mkdir(WWW_ROOT.'img'.DS.'clients');
                        }
                        if(!file_exists(WWW_ROOT.'img'.DS.'clients'.DS.'bg')){
                            mkdir(WWW_ROOT.'img'.DS.'clients'.DS.'bg');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'clients'.DS.'bg'.DS.$client->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'clients'.DS.'bg'.DS.$client->id.'.'.$ext);
                        }
                        $name = $client->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'clients'.DS.'bg'.DS.$name.'.'.$ext);
                        $client->bg_img = 'clients/bg/'.$name.'.'.$ext;
                        $this->Clients->save($client);
                    }
                }
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $tclients = $this->Clients->Tclients->find('list', ['limit' => 200]);
        $this->set(compact('client', 'tclients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

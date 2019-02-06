<?php
namespace App\Controller\Admin;

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
        if($role==1){
            $clients = $this->paginate($this->Clients);
        }else{

            $clients = $this->paginate($this->Clients->find()->where(['client_id'=>$client,'tclient_id'=>3]));
        }
        $this->set(compact('clients'));
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function search(){

        $client = $this->Clients->find()->where(['code'=>$this->request->getData('code')])->first();

        if(!empty($client)){
            $this->loadModel('Dossiers');

            $dossier = $this->Dossiers->get($this->request->getData('dossier'));
            $dossier->owner_id=$client->id;
            $this->Dossiers->save($dossier);
        }

        $this->set(compact('client'));
        $this->set('_serialize',true);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////


    public function disable($id){
        $client=$this->Clients->get($id);
        $client->active=0;
        $client=$this->Clients->save($client);
        if($client){
            $this->loadModel('Users');
            $this->Users->updateAll(['active'=>0],['client_id'=>$id]);
            $this->Flash->success('Desactivation effectuee avec succes !!!');
            return $this->redirect(['action'=>'index']);
        }

        $this->Flash->error('Echec au moment de la desactivation !!!');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function enable($id){
        $client=$this->Clients->get($id);
        $client->active=1;
        $client=$this->Clients->save($client);
        if($client){
            $this->loadModel('Users');
            $this->Users->updateAll(['active'=>1],['client_id'=>$id]);
            $this->Flash->success('Reactivation effectuee avec succes !!!');
            return $this->redirect(['action'=>'index']);
        }

        $this->Flash->error('Echec au moment de la Reactivation !!!');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
            'contain' => ['Tclients', 'Users', 'Dossiers']
        ]);

        $this->loadModel('Dossiers');

        $this->loadModel('Users');

        $users = $this->Users->find()->where(['Users.client_id'=>$client->id])->all();
        $ids = [];
        foreach($users as $user){
            $ids[]=$user->id;
        }

        $dossiers = $this->Dossiers->find()->where(['autor_id in'=>$ids])->all();

        $this->set(compact('dossiers'));

        $title = $client->name;
        $this->set(compact('title'));

        $this->set('client', $client);
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
           // debug($this->request->getData());
            //die();

          $this->loadModel('Users');
            $client = $this->Clients->patchEntity($client, $this->request->getData());


            $client->client_id=$this->Auth->user()['client_id'];
            $client->code=date_format(date_create(),'ymhisd');


            if ($client=$this->Clients->save($client)) {
                $this->loadModel('MoisTclients');
                $tclient_id = $this->request->getData('tclient_id');
                $mois = new \DateTime();
                $mois=date_format($mois,'m');
                $ms=$this->MoisTclients->find()->where(['moi_id'=>$mois,'tclient_id'=>$tclient_id])->first();
                if($ms){
                    $ms->realisation=$ms->realisation+1;
                    $ms=$this->MoisTclients->save($ms);
                }


                $this->Flash->success(__('Le client a ete cree !!!.'));
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
                            unlink(WWW_ROOT.'img'.DS.'clients'.DS.'logos'.DS.$client->id.'.'.$ext);
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

                $user=$this->Users->newEntity();
                $user->last_name=$this->request->getData('last_name');
                $user->first_name=$this->request->getData('first_name');
                $user->phone=$this->request->getData('user_phone');
                $user->password=$this->request->getData('password');
                $user->client_id=$client->id;
                $user->email=$this->request->getData('user_email');
                $user->address=$this->request->getData('user_address');
                $user->active=1;
                if($this->request->getData('tclient_id') == 1 ){
                    $user->role_id=2;
                }

                if($this->request->getData('tclient_id')==2)
                {
                    $user->role_id=3;
                }

                if($this->request->getData('tclient_id')==3)
                {
                    $user->role_id=5;
                }

                if($this->request->getData('tclient_id')==4)
                {
                    $user->role_id=8;
                }

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
            }else{
                $this->Flash->error(__('Erreur lors de l\'enregistrement du Client !!!!.'));
            }
            //$client->tclient_id=$this->request->getData('compagny_id');

            }



        $tclients = $this->Clients->Tclients->find()->all();
        $this->set(compact('client', 'tclients','user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
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

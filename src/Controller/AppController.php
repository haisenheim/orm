<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth',[
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login',
                'prefix' => false,
            ],
            'loginRedirect' => [
                'controller' => 'Front',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Oups!!! Veuillez vous identifier pour acceder à cette zone.',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email'],
                    'scope' => ['Users.active' => 1],
                ]
            ],
            'authorize' => ['Controller'],
            'unauthorizedRedirect'=>$this->referer()

        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized(){
        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');
        $user = $this->Auth->user();
        $headers=explode(',',$this->request->getHeaders()['Accept'][0]);
        //debug($this->Auth); die();
        if(in_array('application/json',$headers)){
            return true;
        };

        //debug($this->request->getServerParams()); die();

        if($controller=="front"&&$action=="index"){
            return true;
        }
        if($this->Auth->user()['role_id']==1){

            return true;
        }

        if($user['role_id']==2){

           // debug($this->request->get); die();

           if(in_array($controller,['Front','Clients','Users','Dossiers','Plans','Plignes'])){

               return true;
           }

            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){

                return true;
            }

        }

        if($user['role_id']==3){

            if(in_array($controller,['Dossiers','Plans','Users','Plignes'])){
                return true;
            }

            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }

        if($user['role_id']==4){

            if(in_array($controller,['Dossiers','Plans','Plignes','Users'])){
                return true;
            }
            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }

        if($user['role_id']==5){
            if(in_array($controller,['Dossiers','Plans','Plignes','Users','Clients'])){
                return true;
            }
            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }

        if($user['role_id']==6){

            if(in_array($controller,['Dossiers','Plans','Plignes','Users'])){
                return true;
            }
            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }

        if($user['role_id']==7){

            if(in_array($controller,['Dossiers','Plans','Plignes','Users'])){
                return true;
            }
            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }

        if($user['role_id']==8){

            if(in_array($controller,['Dossiers','Plans','Plignes','Users','Clients'])){
                return true;
            }
            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }

        if($user['role_id']==9){

            if(in_array($controller,['Dossiers','Plans','Plignes','Users','Questions','Produits','Front'])){
                return true;
            }
            if(in_array($controller,['Produits']) && in_array($action, ['getByIdJson', 'view'])){
                return true;
            }
        }


        return false;
    }



    public function beforeRender(Event $event)
    {
       // debug($this->Auth); die();
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->getType(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }


        if(!array_key_exists('_serialize',$this->viewVars)) {
            {
                if ($this->Auth->user()['role_id'] == 1) {

                    //debug($this->request->getParam('prefix'));

                   // $this->request->addParams(['prefix'=>'admin']);
                    //debug($this->request->getParam('prefix'));
                    //die();
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('admin');
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 2) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('manager');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 3) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('adminpme');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 4) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('agent');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 5) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('admincm');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 6) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('agent-cm');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 7) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('agent-etf');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 8) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('investisseur');
                    $this->loadModel('Clients');
                    $this->set('company', $this->Clients->get($this->Auth->user()['client_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 9) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('expert');
                    $this->set(['usr' => $this->Auth->user()]);
                }
            }
        }



        $token = $this->request->getParam('_csrfToken');
        $this->set(compact('token'));
    }
}

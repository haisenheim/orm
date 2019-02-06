<?php
namespace App\Controller\Investisseur;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 */
class FrontController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


   public function beforeFilter(Event $event){
       parent::beforeRender($event);
       $this->Auth->allow(['view', 'index']);
   }

    public function index()
    {



    }


}

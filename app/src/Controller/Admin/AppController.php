<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Controller\Controller;

class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        // $this->loadComponent('Authentication.Authentication');
        // $this->loadComponent('Auth');

    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Authentication.Authentication');
        $this->viewBuilder()->setLayout('admin');
        
        // echo "=<pre>";print_r($this->Authentication->getResult()->getData()->role);die();
        $data = $this->Authentication->getResult()->getData();
        // echo "<pre>";print_r($data->role);die();
        if($data){
            if($data->role != 'a'){
                echo 'Your are not authorised to access that page?';
                $target = $this->Authentication->getLoginRedirect();
                if (!$target) {
                    $target = ['prefix' => false,'controller' => 'Pages', 'action' => 'home'];
                }
                return $this->redirect($target);
            }
        }else{
            echo 'Your are not authorised to access that page?';
            return $this->redirect(['prefix' => false,'controller' => 'Pages', 'action' => 'home']);
        }
    
    }
}
?>
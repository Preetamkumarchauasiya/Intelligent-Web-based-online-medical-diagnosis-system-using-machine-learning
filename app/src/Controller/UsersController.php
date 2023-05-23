<?php
declare(strict_types=1);
namespace App\Controller;
use Cake\Routing\Route\DashedRoute;

use Cake\View\View;
use Cake\I18n\FrozenTime;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class UsersController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Users');
        // Always enable the MyUtils Helper
        // $this->loadHelper('MyUtils');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // $this->viewBuilder()->setLayout('admin');
        $this->Authentication->addUnauthenticatedActions(['login']);
        $this->Authentication->addUnauthenticatedActions(['register']);
        $this->Authentication->addUnauthenticatedActions(['home']);
        $this->Authentication->addUnauthenticatedActions(['diseases/home']);
    }
    public function login()
    {
        $result = $this->Authentication->getResult();
        $data = $this->Authentication->getIdentity();
        $userRole = $this->Authentication->getResult()->getData()->role;
        if ($result->isValid()) {
            if($userRole){
                return $this->redirect('/admin/users/dashboard');
            }else{
                $target = $this->Authentication->getLoginRedirect();
                if (!$target) {
                    $target = ['controller' => 'Pages', 'action' => 'home'];
                }
                return $this->redirect($target);
            }   
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }
    public function register()
    {
        if ($this->request->is('post')) {
            $user = $this->Users->newEmptyEntity();
            $details = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($details)) {
                // echo "The category has been saved.";
                return $this->redirect(['action' => 'login']);
            }
            echo "Your registration failed and data could not be saved. Please, try again.";
            return $this->redirect(['action' => 'register']);
        }
        // $this->set(compact('User'));
    }


    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            // return $this->redirect(['action' => 'login']);
            return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
        }
    }
    public function sendemail(){}
    public function sendotp(){
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $user = $this->request->data['email'];
            $users = $this->Users->find('all')->where(['email'=> $user]);
            $tmp = $users->toArray();
            if(empty($tmp)){
              echo json_encode(["status"=>"ok"]);
            }else{
              echo json_encode(["status"=>"!ok"]);
            }

        }
          exit;
    

        // $email = $this->request->getData('email');
        // echo "<pre>";print_r($email);die();
        // $findEmail = $this->Users->find('all')->where(['email'=>$email]);
        // echo "<pre>";print_r($findEmail);die();
        // // $this->set(compact('findEmail'));
        // if($findEmail){
        //     echo 'Yes';
        // }else{
        //     echo 'Not exist';
        // }

    }

}


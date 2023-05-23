<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use Cake\I18n\FrozenTime;
use App\Controller\Admin\AppController;
// use Cake\View\View;

class UsersController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Users');
        $this->loadModel('Orders');
        // Always enable the MyUtils Helper
        // $this->loadHelper('MyUtils');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        // $this->loadComponent('Authentication.Authentication');
        
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
      parent::beforeFilter($event);
      $this->viewBuilder()->setLayout('admin');
    }
    public function dashboard()
    {
      $totalUser = $this->Users->find('all')->count();
      $this->set('totalUser',$totalUser);
      $totalOrder = $this->Orders->find('all')->where(['payStatus'=>'1'])->count();
      $this->set('totalOrder',$totalOrder);
      $totalNewOrder = $this->Orders->find('all')->where(['Orders.orderstatus'=>'0'])->count();
      // echo "<pre>";print_r($totalNewOrder);die();
      $this->set('totalNewOrder',$totalNewOrder);
      
      $DispatchOrder = $this->Orders->find('all')->where(['orderstatus'=>'Dispatch'])->order(['modified'=>'DESC'])->toArray();
      $this->set('DispatchOrder',$DispatchOrder);
      $NewOrder = $this->Orders->find('all')->where(['orderstatus'=>'0'])->order(['created'=>'DESC'])->toArray();
      $this->set('NewOrder',$NewOrder);
    }
    public function index($id=null)
    {
        if($id){
            $staff = $this->Users->get($id);
            $this->set(compact('staff'));
            $this->set('userid',$id);
        }else {
            $staff = $this->Users->newEmptyEntity();
            $this->set(compact('staff'));
        }

      if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData();
        $error=0;
        if($error == 0){
            if(!$id) $data["created"] = FrozenTime::now();
            $data["modified"] = FrozenTime::now();
            $staffdata = $this->Users->patchEntity($staff, $data);
            // echo "<pre>=";print_r($data);print_r($staffdata);  die();
            if ($userdata = $this->Users->save($staffdata)) {
            return $this->redirect(['action' => 'summary']);
          } else {
            $this->Flash->error(__('User could not be saved. Please, try again.'));
          }
        }
      }
        
    }
    public function summary()
    {
        $user = $this->Users->find('all')->toArray();
        $this->set(compact('user'));
    }

}


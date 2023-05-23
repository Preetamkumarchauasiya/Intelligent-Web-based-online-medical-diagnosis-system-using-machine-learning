<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
// use Cake\View\View;
use Cake\View\JsonView;
use Cake\I18n\FrozenTime;


class OrdersController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Orders');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->loadModel('Products');
        $this->loadModel('Masters');
        $this->loadModel('Categories');        
    }
    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
      parent::beforeFilter($event);
      $this->viewBuilder()->setLayout('admin');
    }
    public function add($id=null){
        $orderDetails = $this->Orders->get($id);
        $productDetail = $this->Products->find('all')->where(['Products.id' => $orderDetails->product_id])->first();
        $masterDetail = $this->Masters->find('all')->where(['Masters.id' => $orderDetails->master_id])->first();
        $categoryDetail = $this->Categories->find('all')->where(['Categories.id' => $productDetail->category_id])->first();

        $this->set('orderDetails', $orderDetails);
        $this->set('productDetail', $productDetail);
        $this->set('masterDetail', $masterDetail);
        $this->set('categoryDetail', $categoryDetail);

      if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData();
        // echo "<pre>=";print_r($data);  die();
        $error=0;
        if($error == 0){
          if(!$id) $data["created"] = FrozenTime::now();
          $data["modified"] = FrozenTime::now();
          $orderdata = $this->Orders->patchEntity($orderDetails, $data);
          if($this->Orders->save($orderdata)) {
            return $this->redirect(['action' => 'summary']);
          }else{
            $this->Flash->error(__('Orderd could not be update. Please, try again.'));
          }
        }
      }
    }

    public function summary() {    
      $limit=20;
      if(!empty($this->request->getData())){
        $data = $this->request->getData();
      } else {
        // if ($this->request->getAttribute('params')['?']) {
        //   $data = $this->request->getAttribute('params')['?'];
        // }
      }
      if($data['status'] != "") {
        $condition['Orders.status'] = $data['status'];
      } else {
        $data['status'] = $condition['Orders.status'] = 1;
      }
    // echo "<pre>";print_r($data);echo"</pre>";
      if ($data['transaction_id']) {
        $condition['Orders.transaction_id LIKE'] = "%".$data['transaction_id']."%";
      }
      if ($data['orderstatus']) {
        $condition['Orders.orderstatus LIKE'] = "%".$data['orderstatus']."%";
      }
      if ($data['itemPrice']) {
        $condition['Orders.itemPrice LIKE'] = "%".$data['itemPrice']."%";
      }
      $this->paginate = [
        'conditions' => $condition,
        'order' => ['Orders.created' => 'DESC'],
        'limit' => $limit,
      ];
      $orders = $this->paginate('Orders')->toArray();
      $this->set(compact('orders'));
      $this->set(compact('limit'));
      $this->set("filtercondition",$data);

    }
    public function delete($id=null) {
      $order = $this->Orders->get($id);
      if ($this->Orders->delete($order)) {
        $this->Flash->success(__('School deleted successfully.'));
      } else {
        $this->Flash->error(__('School could not be deleted. Please, try again.'));
      }
      return $this->redirect(['action' => 'summary']);
    }
    public function changeStatus(){
      $id = $this->request->getData('id');
      $status = $this->request->getData('status');
      $order = $this->Orders->get($id);
      $update_attribute['status'] = $status;
      $update_attribute['modified'] = FrozenTime::now();
      $order_data = $this->Orders->patchEntity($order, $update_attribute);
      $result = $this->Orders->save($order_data);
      echo json_encode($result->id);
      exit;
    }

}


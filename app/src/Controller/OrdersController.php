<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\View\View;
use Cake\I18n\FrozenTime;

class OrdersController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Orders');
    }
    public function index(){
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data["created"] = FrozenTime::now();
            $data["modified"] = FrozenTime::now();
            $data['status'] = '1';
            $order = $this->Orders->newEmptyEntity();
            $details = $this->Orders->patchEntity($order, $data);

            // echo "<pre>";print_r($details);die();
            if ($orderId = $this->Orders->save($details)) {
                return $this->redirect(['controller' => 'masters','action' => 'view', $orderId->id]);
            }
            echo "Your order could not be place. Please, try again.";
            return $this->redirect(['controller' => 'Carts','action' => 'index']);
        }
    }
    
}
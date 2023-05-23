<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\View\View;

class MastersController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Masters');
        $this->loadModel('Products');
        $this->loadModel('Carts');
        $this->loadModel('Users');
        $this->loadModel('Orders');
        // Always enable the MyUtils Helper
        // $this->loadHelper('MyUtils');
        // $this->loadComponent('Paginator');
    }
    public function index(){
        $cart= $this->Carts->find('all')->contain(['products'])->toArray();
        // $json = $cart->getHeaders();
        // echo "<pre>";print_r($cart);die();
        // $this->set("cart", "$json");
        $this->set(compact('cart'));

        $address = $this->Masters->find()->toArray();
        $this->set(compact('address'));
        $users = $this->Users->find()->toArray();
        $this->set(compact('users'));
    }
    public function address($id = null){
        if($id){
            // echo 'preee'; die();
            $master = $this->Masters->get($id);
            $this->set('master', $master);
            // echo "<pre>";print_r($category);die();
            if ($this->request->is(['patch', 'post', 'put'])) {
                $details = $this->Masters->patchEntity($master, $this->request->getData());
                // echo "<pre>";print_r($details);die();
                if ($this->Masters->save($details)) {
                    // echo "The category has been saved.";
                    return $this->redirect(['action' => 'index']);
                }
                echo "Your address could not be update. Please, try again.";
                return $this->redirect(['action' => 'index']);
            }
        }

        if ($this->request->is('post')) {
            $master = $this->Masters->newEmptyEntity();
            $details = $this->Masters->patchEntity($master, $this->request->getData());

            // echo "<pre>";print_r($details);die();
            if ($this->Masters->save($details)) {
                // echo "The category has been saved.";
                return $this->redirect(['action' => 'index']);
            }
            echo "Your address could not be saved. Please, try again.";
            return $this->redirect(['action' => 'address']);
        }
    }
    public function view($id=null){
        $order = $this->Orders->get($id);
        // echo "<pre>";print_r($order);die();
        $this->set('order', $order);
    }
}
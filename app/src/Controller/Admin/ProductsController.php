<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\FrozenTime;

// use Cake\View\View;

class ProductsController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Products');
        $this->loadModel('Categories');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('admin');
    }

    public function index(){
        $product = $this->Products->find('all');
        $this->set('product', $this->paginate($product, ['limit'=> '5']));
        
    }

    public function add($id = null){
        if($id){
            $product = $this->Products->get($id);
            $this->set('product', $product);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $product['date'] = FrozenTime::now()->i18nFormat('yyyy-MM-dd');
                $postData = $this->request->getData();
                $image = $this->request->getData('pImg');
                $name = $image->getClientFilename();
                $type = $image->getClientMediaType();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                $postData['pImg'] = $name;
                $products = $this->Products->patchEntity($product, $postData);
                // echo "<pre>";print_r($products);die();
                if ($this->Products->save($products)) {
                    echo "The product has been saved.";
                    return $this->redirect(['action' => 'index']);
                }
                echo "The product could not be saved. Please, try again.";die();
            }
        }
        
        if ($this->request->is('post')) {
            $product = $this->Products->newEmptyEntity();
            $product['date'] = FrozenTime::now()->i18nFormat('yyyy-MM-dd');
            $postData = $this->request->getData();
            $image = $this->request->getData('img');
            $name = $image->getClientFilename();
            $type = $image->getClientMediaType();
            $targetPath = WWW_ROOT.'img'.DS.$name;
            $postData['img'] = $name;            
            $products = $this->Products->patchEntity($product, $postData);
            // echo "<pre>";print_r($products);die();
            if ($this->Products->save($products)) {
                echo "The category has been saved.";
                return $this->redirect(['action' => 'add']);
            }
            echo "The category could not be saved. Please, try again.";die();
        }

    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            echo 'The category detail has been deleted.';
            return $this->redirect(['action' => 'index']);
        } else {
            echo 'The category detail could not be deleted. Please, try again.';
        }
        return $this->redirect(['action' => 'index']);
    }
    
}


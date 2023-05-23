<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\View\View;

class ProductsController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Products');
        $this->loadModel('Categories');
        $this->loadModel('Carts');
        $this->loadModel('Banners');
    }

    public function index($id = null){
        // Fetch all records
        $category = $this->Categories->find('all')->where(['Categories.id' => $id])->toArray();
        $this->set(compact('category'));
        $product = $this->Products->find('all')->where(['Products.category_id' => $id])->toArray();
        $this->set(compact('product'));
        $banner = $this->Banners->find('all')->where(['Banners.category_id' => $id])->toArray();
        $this->set(compact('banner'));
        
    }
    public function view($id = null){

        $product = $this->Products->find('all')->where(['Products.id' => $id])->toArray();
        $this->set(compact('product'));
        // echo "<pre>";print_r($Product->toArray());die();
    }
    
}


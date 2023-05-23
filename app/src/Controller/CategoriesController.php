<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\View\View;

class CategoriesController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Categories');
        // Always enable the MyUtils Helper
        // $this->loadHelper('MyUtils');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }

    public function index(){
        $category = $this->Categories->find('all');
        $this->set('category', $this->paginate($category, ['limit'=> '10']));        
    }
    
}


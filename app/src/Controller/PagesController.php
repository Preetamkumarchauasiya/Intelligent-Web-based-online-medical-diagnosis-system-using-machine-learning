<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Carts');
    }
    public function home()
    {
        $category = $this->Categories->find('all')->contain(['products'])->where(['Categories.showHome' => '1'])->toArray();
        // echo "<pre>";print_r($category);die();
        $this->set(compact('category'));
        $cart = $this->Carts->newEmptyEntity();
        if ($this->request->is('post')) {
            $cart1 = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart1)) {
                echo "The category has been saved.";
                return $this->redirect(['action' => 'home']);
            }
            echo "The category could not be saved. Please, try again.";die();
        }

    }
    public function aboutus()
    {

    }
}

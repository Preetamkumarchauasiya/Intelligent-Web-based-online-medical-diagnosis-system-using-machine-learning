<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class CartsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        // $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('Carts');
    }
    public function index($id = null)
    {
        $cart= $this->Carts->find('all')->contain(['products'])->toArray();
        $this->set(compact('cart'));

        if ($this->request->is('post')) {
            $cart = $this->Carts->newEmptyEntity();
            $cart1 = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart1)) {
                return $this->redirect(['controller' => 'Pages','action' => 'home']);
            }
            echo "The category could not be saved. Please, try again.";die();
        }

    }
    public function delete($id = null)
    {
        $cart = $this->Carts->get($id);
        if ($this->Carts->delete($cart)) {
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

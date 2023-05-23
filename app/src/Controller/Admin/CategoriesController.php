<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\I18n\FrozenTime;
// use Cake\View\View;

class CategoriesController extends AppController
{
    public function initialize(): void
    {
        $this->loadModel('Categories');
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->setLayout('admin');
    }

    public function summary(){
        $category = $this->Categories->find('all');
        $this->set('category', $this->paginate($category, ['limit'=> '10']));
    }
    public function add($id = null){
        if($id){
            $category = $this->Categories->get($id);
            $this->set('category', $category);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $category['date'] = FrozenTime::now()->i18nFormat('yyyy-MM-dd');
                $postData = $this->request->getData();
                $image = $this->request->getData('img');
                $name = $image->getClientFilename();
                $type = $image->getClientMediaType();
                $targetPath = WWW_ROOT.'img'.DS.$name;
                $postData['img'] = $name;
                $categories = $this->Categories->patchEntity($category, $postData);
                if ($this->Categories->save($categories)) {
                    echo "The category has been saved.";
                    return $this->redirect(['action' => 'index']);
                }
                echo "The category could not be saved. Please, try again.";die();
            }
        }
        
        if ($this->request->is('post')) {
            $category = $this->Categories->newEmptyEntity();
            $category['date'] = FrozenTime::now()->i18nFormat('yyyy-MM-dd');
            $postData = $this->request->getData();
            $image = $this->request->getData('img');
            $name = $image->getClientFilename();
            $type = $image->getClientMediaType();
            $targetPath = WWW_ROOT.'img'.DS.$name;
            $postData['img'] = $name;
            $categories = $this->Categories->patchEntity($category, $postData);
            if ($this->Categories->save($categories)) {
                echo "The category has been saved.";
                return $this->redirect(['action' => 'add']);
            }
            echo "The category could not be saved. Please, try again.";die();
        }

    }
    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            echo 'The category detail has been deleted.';
            return $this->redirect(['action' => 'index']);
        } else {
            echo 'The category detail could not be deleted. Please, try again.';
        }
        return $this->redirect(['action' => 'index']);
    }
}


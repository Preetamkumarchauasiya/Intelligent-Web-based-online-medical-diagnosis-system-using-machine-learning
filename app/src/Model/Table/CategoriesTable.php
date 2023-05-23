<?php
namespace App\Model\Table;

use Cake\ORM\Table;
// use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class CategoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->hasMany('products')
            ->setForeignKey('category_id');
        $this->setTable('categories');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');
    }
    
}


?>
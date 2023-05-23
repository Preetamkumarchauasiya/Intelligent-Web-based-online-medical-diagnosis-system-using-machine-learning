<?php
namespace App\Model\Table;

use Cake\ORM\Table;
// use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class ProductsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->belongsTo('categories')
            ->setForeignKey('category_id');
        $this->setTable('products');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');
    }
}

?>
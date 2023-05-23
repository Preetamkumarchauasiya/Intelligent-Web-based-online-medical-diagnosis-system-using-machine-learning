<?php
namespace App\Model\Table;

use Cake\ORM\Table;
// use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class OrdersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('orders');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

    }
    
}


?>
<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
// use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

class Order extends Entity
{
    protected $_accessible = [

        'id' => true,
        'master_id' => true,
        'product_id' => true,
        'numItem' => true,
        'itemPrice' => true,
        'transaction_id'=> true,
        'orderstatus'=> true,
        'payStatus' => true,
        'created' => true,
        'status' => true,
        'modified' => true,
    ];
   
}

?>
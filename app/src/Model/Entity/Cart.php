<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
// use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

class Cart extends Entity
{
    protected $_accessible = [

        'id' => true,
        'product_id' => true,
        'numItem' => true,
        'itemPrice' => true,
        'date' => true,
        'status' => true,
        'user_id' => true,
    ];
   
}

?>
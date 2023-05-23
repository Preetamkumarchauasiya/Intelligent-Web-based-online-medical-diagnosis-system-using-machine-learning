<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
// use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

class Product extends Entity
{
    protected $_accessible = [

        'id' => true,
        'pName' => true,
        'pDescription' => true,
        'category_id' => true,
        'pImg' => true,
        'price' => true,
        'date' => true,
        'status' => true,
    ];   
}

?>
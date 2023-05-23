<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
// use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

class Master extends Entity
{
    protected $_accessible = [

        'id' => true,
        'fullName' => true,
        'mobile' => true,
        'pin' => true,
        'address' => true,
        'city' => true,
        'state' => true,
        'type' => true,
        'date' => true,
        'status' => true,
        'user_id' => true,
    ];
   
}

?>
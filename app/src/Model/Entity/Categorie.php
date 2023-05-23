<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
// use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

class Categorie extends Entity
{
    protected $_accessible = [

        'id' => true,
        'cName' => true,
        'img' => true,
        'parentId' => true,
        'date' => true,
        'status' => true,
        'showHome' => true,
    ];
   
}

?>
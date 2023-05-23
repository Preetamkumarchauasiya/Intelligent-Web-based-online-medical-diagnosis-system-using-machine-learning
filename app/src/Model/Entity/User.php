<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
// use Authentication\PasswordHasher\DefaultPasswordHasher;
use Authentication\PasswordHasher\DefaultPasswordHasher;
// use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [

        'id' => true,
        'fName' => true,
        'lName' => true,
        'mobile' => true,
        'email' => true,
        'password' => true,
        'dob' => true,
        'gender' => true,
        'address' => true,
        'pinCode' => true,
        'city' => true,
        'state' => true,
        'date' => true,
        'status' => true,
        'role' => true,
    ];
    protected $_hidden =[
        'password',
    ];
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
   
}

?>
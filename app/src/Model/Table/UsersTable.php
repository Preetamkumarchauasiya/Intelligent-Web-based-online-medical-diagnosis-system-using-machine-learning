<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('users');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');
    }
    public function validationHardened(Validator $validator): Validator
    {
        $validator = $this->validationDefault($validator);
        $validator->add('password', 'length', ['rule' => ['lengthBetween', 8, 100]]);
        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['userName'],'This username has already been used.'));
        return $rules;
    }
}
?>
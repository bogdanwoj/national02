<?php
namespace Classes;

class User extends Base
{
    public $email;

    public $password;

    public $role;
    
    public $username;


    
    public static function getTableName()
    {
        return 'users';
    }

    public function getUserName(){
        return $this->username;
    }

    public function isAdmin(){
        return $this->role == 'admin';
    }
}
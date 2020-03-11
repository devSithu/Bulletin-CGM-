<?php

namespace App\Contracts\Dao;

interface PasswordResetDaoInterface 
{
    public function createToken($email);
    public function getToken($token);
    public function deleteToken($token);
    public function deleteTokenbyEmail($email);
}
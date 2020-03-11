<?php

namespace App\Contracts\Dao;
interface UserDaoInterface {
   
    public function update_user_profile($userData,$id);
    public function change_password($userData,$id);
    public function change($userData,$id);
    public function look_info($id);
    
    //session
    public function registerUser($data);
    public function loginUser($request);

    public function verifyEmail($email);
    public function changePassword($email, $request);
}
<?php

namespace App\Contracts\Service;

use Illuminate\Http\Request;

interface UserServiceInterface {
    public function update_user_profile(Request $request,$id);
    public function change_password(Request $request,$id);
    public function change(Request $request,$id);

    //session 
    public function loginUser($request);
    public function registerUser($request);

    public function verifyEmail($email);
    public function changePassword($email, $request);
}
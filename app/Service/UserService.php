<?php

namespace App\Service;

use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Service\AdminServiceInterface;
use App\Contracts\Service\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface, AdminServiceInterface
{
    private $userDao;
    private $adminDao;
    public function __construct(UserDaoInterface $userDao, AdminDaoInterface $adminDao)
    {
        $this->userDao = $userDao;
        $this->adminDao = $adminDao;
    }
    
    public function update_user_profile(Request $request, $id)
    {
        $userData = $request->only(['name', 'email']);
        return $this->userDao->update_user_profile($userData, $id);
    }

    public function look_info($id)
    {
        return $this->userDao->look_info($id);
    }

    public function change_password(Request $request, $id)
    {
        $userData = $this->userDao->change_password($request, $id);
        return view('user.change_password')->with('data', $userData);
    }
    public function changePassword($email, $newPassword)
    {
        return $this->userDao->changePassword($email, $newPassword);
    }

    public function change(Request $request, $id)
    {

        $result = $this->adminDao->update_user_account_page($id);

        if (!Hash::check($request->old_password, $result['password'])) {
            return "Old Password Not Match. Try Again!";
        } else if (!(strlen($request->password) >= 6 && strlen($request->confirm_password) >= 6)) {
            return "Password Must Be At Least 6";
        } else if (!($request->password == $request->confirm_password)) {
            return "Retype Password Again!";
        } else {
            $userData = ['password' => Hash::make($request->password)];
            $this->userDao->change($userData, $id);
            return "Reset Success!";
        }

    }

    //session 
    public function registerUser($request)
    {
        if(!($request->password == $request->password_confirmation))
        {
            return false;
        }
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $this->userDao->registerUser($data);
        return true;
    }

    public function loginUser($request)
    {
        return $this->userDao->loginUser($request);
    }

    public function verifyEmail($email)
    {
        return $this->userDao->verifyEmail($email);
    }
}

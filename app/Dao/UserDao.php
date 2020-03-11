<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\User;
use App\News;
use App\Contracts\Dao\NewsDaoInterface;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    /**
     * update user profile 
     * @method updateUserProfile
     * @param  string $userData , int $id
     * @return string "success"
     */
    public function update_user_profile($userData, $id)
    {
        return User::findOrFail($id)->update($userData);
    }

    /**
     * search user password for change
     * @method searchUserPasswordForChange
     * @param  string $userData, int $id
     * @return data $user
     */
    public function change_password($userData, $id)
    {
        return User::findOrFail($id);
    }

    /**
     * change user password
     * @method changeUserPassword
     * @param  string $userData, int $id
     * @return string "success"
     */
    public function change($userData, $id)
    {
        return User::findOrFail($id)->update($userData);
    }
    
    /**
     * search user data
     * @method searchUserData
     * @param  int $id
     * @return data $user
     */
    public function look_info($id)
    {
        return  User::findOrFail($id);
    }

    //session
    /**
     * store register user
     * @method storeRegisterUser
     * @param  string $data
     * @return void
     */
    public function registerUser($data)
    {
        return User::create($data);
    }

    /**
     * check login user
     * @method checkLoginUser
     * @param  int $request
     * @return string
     */
    public function loginUser($request)
    {
        return User::where('email',$request->email)->first();
    }

     /**
     * verifyEmail
     * @method verifyEmail 
     * @param string $email
     * @return boolean
     */
    public function verifyEmail($email)
    {
        if (User::where('email', $email)->count() == 0) {
            return false;
        }
        return true;
    }

    /**
     * change password with send email
     * @method changePasswordWithSendEmail
     * @param  string $email, string $newPassword
     * @return void
     */
    public function changePassword($email, $newPassword)
    {
        $result = User::where('email', $email)->update([
            'password' => Hash::make($newPassword),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $result;
    }
}

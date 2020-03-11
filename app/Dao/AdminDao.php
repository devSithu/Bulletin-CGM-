<?php

namespace App\Dao;

use App\Contracts\Dao\AdminDaoInterface;
use App\User;
use App\News;

class AdminDao implements AdminDaoInterface
{
    /**
     * Look User Info
     * @method lookUserInfo
     * @param  -
     * @return user
     */
    public function look_user_info()
    {
        return User::get();
    }


    /**
     * delete user account by user id
     * @method deleteUserAccount
     * @param  int $id
     * @return void
     */
    public function delete_user_account($id)
    {
        return User::findOrFail($id)->delete();
    }

    /**
     * search user account data
     * @method search user account data
     * @param  int $id
     * @return data user
     */
    public function update_user_account_page($id)
    {
        // $result = User::findOrFail($id);
        // return view('admin.update_user_account_page')->with('data',$result);
        return User::findOrFail($id);
    }


    /**
     * update user account 
     * @method updateUserAccount
     * @param  string $userData , int $id
     * @return data $user
     */
    public function update_user_account_info($userData, $id)
    {
        return $result = User::findOrFail($id)->update($userData);

    }
}

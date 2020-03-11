<?php

namespace App\Service;

use Illuminate\Http\Request;
use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Service\AdminServiceInterface;

class AdminService implements AdminServiceInterface 
{
    private $adminDao;
    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
     * Look User Info
     * @method lookUserInfo
     * @param  -
     * @return user
     */
    public function look_user_info()
    {
        return $this->adminDao->look_user_info();
    }

     /**
     * delete user account by user id
     * @method deleteUserAccount
     * @param  int $id
     * @return void
     */
    public function delete_user_account($id)
    {
        return $this->adminDao->delete_user_account($id);
    }

     /**
     * search user account data
     * @method search user account data
     * @param  int $id
     * @return data user
     */
    public function update_user_account_page($id)
    {
        return $this->adminDao->update_user_account_page($id);
    }

    /**
     * update user account 
     * @method updateUserAccount
     * @param  string $userData , int $id
     * @return data $user
     */
    public function update_user_account_info(Request $request, $id)
    {
        $userData = $request->only(['name', 'email' ,'isAdmin','isVip']);
        return $this->adminDao->update_user_account_info($userData, $id);
    }
}

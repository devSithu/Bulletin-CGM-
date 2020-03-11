<?php

namespace App\Contracts\Dao;

interface AdminDaoInterface {
  public function look_user_info();
  public function delete_user_account($id);
  public function update_user_account_page($id);
  public function update_user_account_info($userData, $id);
}
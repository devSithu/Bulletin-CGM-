<?php

namespace App\Dao;

use App\Contracts\Dao\NewsDaoInterface;
use App\User;
use App\News;
use Auth;
use Illuminate\Http\Request;

class NewsDao implements NewsDaoInterface
{

    /**
     * store user info
     * @method storeUserInfo
     * @param  data $userData
     * @return string "success"
     */
    public function store($userData)
    {
        return News::create($userData);
    }

    /**
     * delete news by id
     * @method deleteNewsById
     * @param  int $id
     * @return string "success"
     */
    public function destroy($id)
    {
        return $data = News::findOrFail($id)->delete();
    }

    /**
     * search news data by id
     * @method searchNewsDataById
     * @param  int $id
     * @return data $news
     */
    public function update_page($id)
    {
        return  News::findOrFail($id);
    }

    /**
     * update news 
     * @method updateNews
     * @param  string $userData, int $id
     * @return string "success"
     */
    public function update($userData, $id)
    {
        return  News::findOrFail($id)->update($userData);
    }
    

   
}

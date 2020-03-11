<?php

namespace App\Service;

use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\NewsDaoInterface;
use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Service\NewsServiceInterface;
use App\Contracts\Service\AdminServiceInterface;
use Auth;

class NewsService implements NewsServiceInterface,AdminServiceInterface
{
    private $newsDao;
    private $adminDao;
    public function __construct(NewsDaoInterface $newsDao,AdminDaoInterface $adminDao)
    {
        $this->newsDao = $newsDao;
        $this->adminDao = $adminDao;
    }

  
    /**
     * store user info
     * @method storeUserInfo
     * @param  data $userData
     * @return string "success"
     */
    public function store(Request $request){
    
    $userData=[
        'user_id' =>session()->get('AUTH')->id,
        'name' => $request->name,
        'title' => $request->title,
        'object' => $request->object,
    ];
        return $this->newsDao->store($userData);

    }
  
     /**
     * delete news by id
     * @method deleteNewsById
     * @param  int $id
     * @return string "success"
     */
    public function destroy($id)
    {
        return $this->newsDao->destroy($id);
    }

     /**
     * search news data by id
     * @method searchNewsDataById
     * @param  int $id
     * @return data $news
     */
    public function update_page($id)
    {
        return $this->newsDao->update_page($id);
    }

    
    /**
     * update news 
     * @method updateNews
     * @param  string $userData, int $id
     * @return string "success"
     */
    public function update(Request $request, $id)
    {
        $userData = $request->only(['name', 'title', 'object']);
        return $this->newsDao->update($userData, $id);
    }

    
    

}

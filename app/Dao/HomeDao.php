<?php

namespace App\Dao;

use App\Contracts\Dao\HomeDaoInterface;
use App\User;
use App\News;

class HomeDao implements HomeDaoInterface
{

    /**
     * search news data
     * @method searchNewsData
     * @param  -
     * @return data news
     */
    public function index()
    {
        return News::orderBy('id','desc')->paginate(config('constants.PAGINATE_LENGTH'));
        // return view('home')->with('data',$data);
    }

  
}

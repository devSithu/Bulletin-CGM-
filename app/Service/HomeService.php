<?php

namespace App\Service;

use App\Contracts\Dao\HomeDaoInterface;
use App\Contracts\Service\HomeServiceInterface;

class HomeService implements HomeServiceInterface 
{
    private $homeDao;
    public function __construct(HomeDaoInterface $homeDao)
    {
        $this->homeDao = $homeDao;
    }

    
    /**
     * search news data
     * @method searchNewsData
     * @param  -
     * @return data news
     */
    public function index()
    {
        return $this->homeDao->index();
    }



}



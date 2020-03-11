<?php

namespace App\Http\Controllers;
use App\User;
use App\News;
use Illuminate\Http\Request;
use App\Contracts\Service\HomeServiceInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $homeService;
    public function __construct(HomeServiceInterface $homeService)
    {
        $this->middleware('auth');
        $this->homeService = $homeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $userData= $this->homeService->index();
        return view('home')->with('data',$userData);
    }
}

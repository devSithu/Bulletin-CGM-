<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Service\UserServiceInterface;

class RegisterController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function showRegister()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        
        $rules = array(
            'name'    => 'required',
            'email'   => 'required|email|unique:users',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            
            $data=$this->userService->registerUser($request);
            
            if($data == false)
            return back()->with(['status'=>'Password Not Same. Retype Again!']);
            else 
            return redirect('login_page');
        }
    }

    public function homePage()
    {
        return view('home_page');
    }

    


    
}

<?php

namespace App\Http\Controllers\User;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Contracts\Service\UserServiceInterface;

class LoginController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }
    
    public function login_page()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $rules = array(
            'email'   => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
           return redirect()->back()->withInput()->withErrors($validator);
        } 
        else { 

            $user = $this->userService->loginUser($request);     //$user = have login email
            if($user == null)
            {
                return redirect()->back()->with(['status'=>'Email Not Found!!']);
            }
            if (!Hash::check($request->password, $user->password)) 
            {
                return redirect()->back()->with(['status'=>'Password not match! Try Again!!']);
            }
            Session::put('AUTH', $user);   //insert auth session with login email

            return redirect('home');
        
        }
    }

    public function logout()
    {
        Session::forget('AUTH');  // delete auth session
        return redirect('/'); 
    }
}

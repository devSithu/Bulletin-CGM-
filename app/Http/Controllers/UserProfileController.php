<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\News;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Service\UserServiceInterface;

class UserProfileController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
    public function look_info($id){
        // $result=User::findOrFail($id);
        // return view('user.user_profile')->with('data',$result);
        $userData= $this->userService->look_info($id);
        return view('user.user_profile')->with('data', $userData);
    }

    public function update_user_profile(Request $request,$id){
        // $data=[
        //     'name' => $request->name,
        //     'email' => $request->email,
        // ];
        // $update=User::findOrFail($id)->update($data);
        // return redirect('home')->with('status','You Successfully Created');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $this->userService->update_user_profile($request,$id);
        return back()->with('status', 'Success Update!');
    }

    public function change_password(Request $request,$id){
        // $result=User::findOrFail($id);
        // return view('user.change_password')->with('data',$result);
        return $this->userService->change_password($request,$id);
    }

    public function change(Request $request,$id){
        // $result=User::findOrFail($id);

        //     //old password match in database??
        //     if(! Hash::check($request->old_password,$result['password']))
        //     {
        //         return redirect('change_password/'.$id)->with('error','Old Password not correct! Try Again!!');
        //     }
        //     else
        //     {
        //     //new two password have length 6??
        //     if(!(strlen($request->password) ==6 && strlen($request->confirm_password)==6))
        //     {
        //         return redirect('change_password/'.$id)->with('error','Password Must Be At Least 6');
        //     }

        //     //new two password equal??  //equal case
        //     else if($request->password == $request->confirm_password)
        //     {
        //         $data=[
        //             'password'=>Hash::make($request->password)
        //         ];
        //         $update=User::findOrFail($id)->update($data);
        //         return redirect('change_password/'.$id)->with('success','Successfull!!');
        //     }
        //     //if new two password not equals
        //     else
        //     return redirect('change_password/'.$id)->with('error','Retype New Password. Try Again!');
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
       $userData= $this->userService->change($request,$id);
        return back()->with('status', $userData);

        }
}

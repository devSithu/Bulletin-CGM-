<?php

namespace App\Http\Controllers;

use App\Contracts\Service\AdminServiceInterface;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    private $adminService;
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->middleware('auth');
        $this->adminService = $adminService;
    }

    public function look_user_info()
    {
        // $data=User::get();
        // return view('admin.look_user_info')->with('data',$data);
        $userData = $this->adminService->look_user_info();
        return view('admin.look_user_info')->with('data', $userData);
    }

    public function delete_user_account($id)
    {
        // $data=User::findOrFail($id)->delete();
        // return redirect('look_user_info')->with('status','Delete Success!');
         $this->adminService->delete_user_account($id);
        return back()->with('status','Delete Success!');
    }

    public function update_user_account_page($id)
    {
        // $result=User::findOrFail($id);
        // return view('admin.update_user_account_page')->with('data',$result);
        $userData =$this->adminService->update_user_account_page($id);
        return view('admin.update_user_account_page')->with('data',$userData);
    }

    public function update_user_account_info(Request $request, $id)
    {
        // $update=User::findOrFail($id)->update($request->all());
        // return redirect('home')->with('status','Update Success');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'isAdmin' => 'required',
            'isVip' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $this->adminService->update_user_account_info($request, $id);
        return back()->with('status','Success Update!');
        // return redirect('home')->with('status', 'Update Success');
    }
}

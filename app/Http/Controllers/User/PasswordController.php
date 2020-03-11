<?php

namespace App\Http\Controllers\User;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Service\UserServiceInterface;
use App\Contracts\Service\PasswordResetServiceInterface;


class PasswordController extends Controller
{

    private $userService;
    private $PasswordResetService;

    public function __construct(UserServiceInterface $userService, PasswordResetServiceInterface $PasswordResetService)
    {
        $this->userService = $userService;
        $this->PasswordResetService = $PasswordResetService;
    }


    public function showVerificationForm()
    {
        return view('auth.passwords.forgot');
    }

    public function sendResetPassword(Request $request)
    {
        // return $request->email; 
        
        if (!$this->userService->verifyEmail($request->email)) {
            return redirect()->back()->with(['error' => 'User with this email address does not exist']);
        }
        $token = $this->PasswordResetService->createToken($request->email);
        
        if (is_null($token)) {
            return view('/');
        }
        $passwordResetUrl = route('resetPassword', ['token' => $token]);
        $this->PasswordResetService->sendPasswordResetMail($request->email, $passwordResetUrl);
        return redirect()->back()->with(['success' => 'Reset Code was sent']);
    }

    /**
     * Show Password Reset Form
     * @method showResetForm 
     * @param string $token
     * @return view
     */
    public function showResetForm($token)
    {
        $tokenData = $this->PasswordResetService->getToken($token);
        if (is_null($tokenData)) {
            return view('auth.passwords.reset')->with(['status' => 'Invalid Token']);
        } elseif ($tokenData->expired_at < date('Y-m-d H:i:s')) {
            $this->PasswordResetService->deleteToken($token);
            return view('auth.passwords.reset')->with(['status' => 'Expired Token']);
        }
        return view('auth.passwords.reset', compact('token'));
    }

    /**
     * Change Password
     *@method changePassword 
     * @param Request $request
     * @return view
     */
    public function changePassword(Request $request)
    {
        $validator = $this->validatePasswordReset($request);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $tokenData = $this->PasswordResetService->getToken($request->token);
        
        if (is_null($tokenData)) {
            return redirect()->back()
                ->with(['status' => 'No Token found']);
        }
        $this->userService->changePassword($tokenData->email, $request->password);
        $this->PasswordResetService->deleteToken($tokenData->token);
        return view('user.login')->with(['status' => 'Reset Password Successfully']);
    }

    /**
     * Password Reset Validation
     *@method validatePasswordReset 
     * @param Request $request
     * 
     */
    private function validatePasswordReset(Request $request)
    {
        return $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|max:20|string',
        ]);
    }
}

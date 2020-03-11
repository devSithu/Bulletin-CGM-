<?php

namespace App\Dao;

use App\Contracts\Dao\PasswordResetDaoInterface;
use App\PasswordReset;
use Carbon\Carbon;
use constants;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\News;

class PasswordResetDao implements PasswordResetDaoInterface
{
    /**
     * Create Token for password Reset
     * @method createToken
     * @param  string $email
     * @return string $token
     */
    public function createToken($email)
    {
        
        PasswordReset::where('email', $email);
        $token = str_random(config('constants.TOKEN_LENGTH'));
        $now = Carbon::now();
        $result = PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => $now,
            'expired_at' => Carbon::parse($now)->addMinutes(config('constants.TOKEN_EXPIRE_TIME')),
        ]);
        if (!$result) {
            return null;
        }
        return $token;
    }

    /**
     * Get Token data
     * @method getToken
     * @param  string $token
     * @return string
     */
    public function getToken($token)
    {
        
        return PasswordReset::where('token', $token)->first();    
    }

    /**
     * delete TOKEN
     * @method deleteToken
     * @param  string $token
     * @return void
     */
    public function deleteToken($token)
    {
        PasswordReset::where('token', $token)->delete();
    }

    /**
     * delete TOKEN by email
     * @method deleteTokenbyEmail
     * @param  string $email
     * @return void
     */
    public function deleteTokenbyEmail($email)
    {
        PasswordReset::where('email', $email)->delete();
    }
}
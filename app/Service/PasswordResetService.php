<?php

namespace App\Service;


use Mail;
use App\Contracts\Dao\PasswordResetDaoInterface;
use App\Contracts\Service\PasswordResetServiceInterface;

class PasswordResetService implements PasswordResetServiceInterface 
{
    private $PasswordResetDao;

    /**
     * Constructor
     * @method _construct
     * @param PasswordResetDaoInterface $PasswordResetDao
     */
    public function __construct(PasswordResetDaoInterface $PasswordResetDao)
    {
        $this->PasswordResetDao = $PasswordResetDao;
    }

   /**
     * Create Token for password Reset
     * @method createToken
     * @param  string $email
     * @return string $token
     */
    public function createToken($email)
    {
        $this->PasswordResetDao->deleteTokenbyEmail($email);
        return $this->PasswordResetDao->createToken($email);
    }

    /**
     * Get Token data
     * @method getToken
     * @param  string $token
     * @return string
     */
    public function getToken($token)
    {
        return $this->PasswordResetDao->getToken($token);
    }

    /**
     * delete TOKEN
     * @method deleteToken
     * @param  string $token
     * @return void
     */
    public function deleteToken($token)
    {
        return $this->PasswordResetDao->deleteToken($token);
    }

    /**
     * Sending Email for Password Reset Link
     *
     * @param  $email
     * @param  $passwordResetUrl
     * @return void
     */
    public function sendPasswordResetMail($email, $passwordResetUrl)
    {
        // $data['title'] = "Reset Password";
        
        $data=['url'=>$passwordResetUrl, 'email'=>$email];

        Mail::send('auth.passwords.reset-link', $data, function($message) use ($email, $passwordResetUrl) {
            $message->to($email, 'Receiver Name');
            $message->subject('PasswordResetLink');
            $message->setBody('Password Reset Link : ' . $passwordResetUrl, 'text/plain');
        });
        if (Mail::failures()) {
        return redirect()->back()->with(['success'=>'Sorry Sending Fail']);
         }else{
        return redirect()->back()->with(['success'=>'Reset Code was sent']);
         }
    }

}
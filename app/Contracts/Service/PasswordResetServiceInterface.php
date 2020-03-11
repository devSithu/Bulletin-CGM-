<?php

namespace App\Contracts\Service;

interface PasswordResetServiceInterface
{
    /**
     * Create Token
     *@method CreateToken
     * @param string $email
     * @return void
     */
    public function createToken($email);

    /**
     * Get Token
     *@method getToken
     * @param string $token
     * @return void
     */
    public function getToken($token);
    
    /**
     * Delete Token
     *@method deleteToken()
     * @param string $token
     * @return void
     */
    public function deleteToken($token);

    /**
     * Send Email For Reset Password
     *
     * @param string $email
     * @param string $passwordResetUrl
     * @return void
     */
    public function sendPasswordResetMail($email, $passwordResetUrl);

}
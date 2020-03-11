<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    protected $primaryKey = null;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'email' , 'token', 'created_at' ,'expired_at'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=['user_id','name','title','object'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=['username','password','user_type'];

    protected $table='users';

    public function Events(){
        return $this->hasMany('App\Events');
    }
}

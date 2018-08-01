<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable=['events_title','description','verify','user_id'];

    protected $table='events';

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

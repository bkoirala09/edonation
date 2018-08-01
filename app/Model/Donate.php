<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $fillable=['event_id','user_id','amount'];

    protected $table='donate';
}

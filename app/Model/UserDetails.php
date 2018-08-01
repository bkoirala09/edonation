<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable=['fullname','city','state','street','contact_no','user_id'];

    protected $table='user_details';
}

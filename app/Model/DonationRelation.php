<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DonationRelation extends Model
{
    protected $fillable=['user_id','events_id'];

    protected $table='donationrelation';
}

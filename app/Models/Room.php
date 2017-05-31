<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $guarded=[''];

    public $dates= ['end_at'];
    public function activity(){
       return $this->belongsTo(Activity::class);
    }
}

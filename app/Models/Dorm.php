<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    public $guarded=[''];

    public function members(){
        return $this->belongsToMany(User::class,'members');
    }
}

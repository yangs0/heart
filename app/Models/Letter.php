<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    public $guarded=[''];


    public function toUser(){
        return $this->belongsTo(User::class,'to_id');
    }

    public function fromUser(){
        return $this->belongsTo(User::class,'from_id');
    }
}

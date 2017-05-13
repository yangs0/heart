<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $table = 'social_account';

    public $guarded=[''];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

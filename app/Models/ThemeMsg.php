<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThemeMsg extends Model{
    public $table = "room_msg";
    public $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMsg extends Model
{
    public $table = "chat_msg";
    public $guarded = [''];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ddd(){
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notices extends Model{
    public $guarded = [''];

    public function fromUser(){
        return $this->belongsTo(User::class,'formId');
    }

    function scopeCreateNotice($query, User $user, $data){
        Notices::firstOrCreate($data);
        if ($followers = $user->followers){
            foreach ($followers as $follower){
               $data['user_id'] = $follower->id;
                Notices::firstOrCreate($data);
            }
        }
    }

    function scopeCreateNoticeToFollowers($query,User $user, $data){
        if ($followers = $user->followers){
            foreach ($followers as $follower){
                $data['user_id'] = $follower->id;
                Notices::firstOrCreate($data);
            }
        }
    }
}

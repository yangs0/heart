<?php

namespace App\Models;

use App\Models\Traits\FollowTraits;
use App\Models\Traits\VoteTraits;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    use Notifiable;
    use VoteTraits, FollowTraits;

    public $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function topics(){
        return $this->hasMany(Topic::class);
    }

    public function members(){
        return $this->belongsToMany(Dorm::class,'members');
    }



    public function sendPasswordResetNotification($token){
        $data = [
            'url' => url('password/reset', $token),
            'name'  => $this->name
        ];
        $template = new SendCloudTemplate('reset_password_mail', $data);

        Mail::raw($template, function ($message){
            $message->from('miss_ysp@163.com', 'Muyi');
            $message->to($this->email);
        });
    }

}

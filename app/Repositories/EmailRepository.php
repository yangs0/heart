<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 16-12-8
 * Time: 下午11:21
 */

namespace App\Repositories;


use App\Models\User;
use App\Repositories\Interfaces\UserResitoryInterfaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class EmailRepository implements UserResitoryInterfaces
{

    protected $user;


    public function __construct(){

    }

    /**
     * 验证激活码(尚需优化)
     * @param $token
     * @return bool
     */
    public function activeTokenVerify($token, $email){
        $user = User::where(["email"=>$email,'verification_token'=>$token])->first();

        if (is_null($user)){
            return false;
        }
        $user->verification_token = uniqid();
        $user->is_active = "yes";
        $user->save();

        \Auth::login($user);
        return true;
    }

    //sendCloud发 送
    public function sendVerifyEmailTo($user){
        $data = [
            'url' => route('email.verify', ['token'=>$user->verification_token, 'email'=>$user->email]),
            "name"=>$user->name
        ];
        $template = new SendCloudTemplate('test_template_active', $data);

        Mail::raw($template, function ($message) use($user){
            $message->from('miss_ysp@163.com', 'Muyi');
            $message->to($user->email);
        });
    }


}
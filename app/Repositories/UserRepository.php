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

class UserRepository implements UserResitoryInterfaces
{

    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function getUserInfo($id){
        return $this->user->findOrFail($id);
    }

    public function userInfoUpdate($data){
        $user = Auth::user();
        return $user->update($data);
    }


}
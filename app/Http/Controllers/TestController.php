<?php

namespace App\Http\Controllers;

use App\Events\DormChatEvent;
use App\Models\Theme;
use App\Models\Topic;
use App\Models\User;
use App\Repositories\Interfaces\UserResitoryInterfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function createPost(UserResitoryInterfaces $repository)
    {
        // validate request, create the post, and...
       /* $member = Auth::user()->member();
        $member->incrementPostCount();
        $repository->save($member);*/

       dd("aaccca");
    }
    public function deletePost(UserResitoryInterfaces $repository)
    {
        // validate request, delete the post, and...
        $member = Auth::user()->member();
        $member->decrementPostCount();
        $repository->save($member);
    }
    public function dashboard(UserResitoryInterfaces $repository)
    {
        $members = $repository->findTopPosters(20);
        return view('dashboard', compact('members'));
    }

    public function aaaa()
    {
       /* \DB::enableQueryLog();
        $user = User::findOrFail(1);
        dump($user->isFollowing(2));
        dd( \DB::getQueryLog());*/
       //return view("explore");
        \DB::enableQueryLog();
        $t = Topic::where('theme_id',1)->groupBy('user_id')->orderBy('user_count', 'desc')->with('user')
            ->select(\DB::raw('count(*) as user_count, user_id'))->get()->pluck('user');
        dump($t);
        dd( \DB::getQueryLog());

      // Redis::publish('chatRoom',json_encode(['event'=>"sdasdas", "data"=>["name"=>"dsad"]]));
    }
}

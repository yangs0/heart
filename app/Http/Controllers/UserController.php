<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Notices;
use App\Models\Reply;
use App\Models\Social;
use App\Models\Topic;
use App\Models\User;
use App\Repositories\UserRepository;
use ClassPreloader\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelSocialite\Socialite;


class UserController extends Controller
{

    /*protected $userRepository;
    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }*/

    public function __construct(){
        //$this->middleware('auth', ['only'=>['edit','update']]);
    }
    /**
     * 帐号激活(尚需优化)
     */
    public function activeUser($token,$email){

        //\DB::enableQueryLog();
        $result = app('App\Repositories\EmailRepository')->activeTokenVerify($token, $email);
        //dump( \DB::getQueryLog());
        if ($result){
            return redirect('/');
        }else{
            flash('激活链接已经失效，用户已激活','error')->important();
            return redirect('/login');
        }
    }


    /**
     * 用户资料
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $user = app('App\Repositories\UserRepository')->getUserInfo($id);
         // $recentTopic = app('App\Repositories\TopicRepositories')->fetchTopicsWithFilterByUserId($id, 5)->take(5)->get();

       /* $user = User::with([
            "topics"=>function($query){
                $query->select('id','title','user_id','theme_id');},
            "topics.theme"])->select('id','name')->find($id);
        dump($user->toArray());*/


        $topics = app('App\Models\Topic')->fetchUserTopicWithFilter($id,'default', 8);

        return view('user.show', compact('user', 'topics'));
    }
    /**
     * 用户最近操作显示（未完成）  -----需要优化啊
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showVote($id){
        $user = User::findOrFail($id);
        //这边获取打列表不对
        $topics = app('App\Models\Topic')->getUserTopicWithFilter($id,'default', 12);
        return view('user.show_vote', compact('user', 'topics'));
    }
    /**
     * 用户最近操作显示（未完成）  -----需要优化啊
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showComment($id){
        $user = User::findOrFail($id);
        $replies = app(Reply::class)->getRecentComment($id,8);
        return view('user.show_comment', compact('user', 'replies'));
    }
    /**
     * 用户最近操作显示（未完成）  -----需要优化啊
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showTopic($id){
        $user = User::findOrFail($id);
        $topics = app('App\Models\Topic')->getUserTopicWithFilter($id,'default', 8);

        return view('user.show_topic', compact('user', 'topics'));
    }

    /**
     * 信息修改 (尚且不完善。需要修改)
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(){
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }
    public function editLink(){
        $user = Auth::user();
        return view('user.edit_link', compact('user'));
    }
    public function editPwd(){
        $user = Auth::user();
        return view('user.edit_pwd', compact('user'));
    }


    /**
     * ----------------------------------------
     * User Follow function
     * ----------------------------------------
     */

    public function doFollow($id)
    {
        $user = User::findOrFail($id);

        if (Auth::user()->isFollowing($id)) {
            Auth::user()->unfollow($id);
        } else {
            Auth::user()->follow($id);
            Notices::createNotice(Auth::user(),[
                'user_id'=>$id,
                'formId'=>Auth::id(),
                'type'=>'follow',
                "line_id"=>$id
            ]);
        }
        Auth::user()->update(['follower_count' => $user->followers()->count()]);

        return response()->json(['msg'=>"success"]);
        //return redirect(route('users.show', $id));
    }


    public function update(UserRequest $request, $id){
        $user = User::findOrFail($id);
        $request->performUpdate($user);
        return redirect()->route('users.show', $id);
    }


    /*public function socialCallBack($type){

        $social_account = Socialite::driver('github')->user();

        dd($social_account);
        $social__user = Social::where('social_id',$social_account->id)->with('user')->first();
        if (!Auth::check() && $social__user){
            Auth::login($social__user->user);
        }elseif (Auth::check()){
            $user = Auth::user();
            Social::firstOrCreate([
                'user_id'=>$user->id,
                'social_id'=>$social_account->id,
                'type'=>$type
            ]);

            $user->github_name = $social_account->nickname;
            $user->github_link = $social_account->user['html_url'];
            $user->save();
            return redirect('/users/edit_link');
        }
        return redirect('/');
    }
    public function socialLogin($type){
        return Socialite::driver($type)->redirect();
    }*/

    public function socialLogin(){
        $type = 'github';
        return Socialite::driver($type)->redirect();
    }

    public function socialCallBack($type){
        $type = 'github';
        $social_account = Socialite::driver($type)->user();

        $social__user = Social::where('social_id',$social_account->id)->with('user')->first();
        if (!Auth::check() && $social__user){
            Auth::login($social__user->user);
        }elseif (Auth::check()){
            $user = Auth::user();
            Social::firstOrCreate([
                'user_id'=>$user->id,
                'social_id'=>$social_account->id,
                'type'=>$type
            ]);

           if ($type == 'weibo'){
               $user->weibo_name = $social_account->nickname;
               $user->weibo_link = $social_account->original['html_url'];
           }else{
               $user->github_name = $social_account->nickname;
               $user->github_link = $social_account->original['html_url'];
           }
            $user->save();
            return redirect('/users/edit_link');
        }
        return redirect('/');
    }

}

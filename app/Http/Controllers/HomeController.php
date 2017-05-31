<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Notices;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
       // $users = app('App\Repositories\UserRepository')->getActiveUser();
        $users = User::where("topics_count",'desc')->take(3)->get();
            //session()->flash("flash_return_msg",['msg'=>'欢迎回来,','status'=>'success']);
        $themes = app('App\Models\Theme')->orderBy('topics_count')->take(6)->get();
        $topics = app('App\Models\Topic')->groupBy('theme_id')->orderBy('created_at','desc')->take(6)->get();
        $hotTopics = app('App\Models\Topic')->with('user')->orderBy('reply_count','desc')->orderBy('created_at','desc')->take(5)->get();

        //$notices = Notices::where('type',['activity','topic'])->with('fromUser')->orderBy('created_at','desc')->get();
        if (Auth::check()){
            $rencentTopics = app('App\Models\Topic')->with('user')->orderBy('created_at','desc')->take(5)->get();
        }else{
            $rencentTopics = app('App\Models\Topic')->with('user')->orderBy('created_at','desc')->take(5)->get();
        }


        $activities =Activity::where('end','>', Carbon::now())->orderBy('created_at','desc')->get();

        return view('pages.home',compact('users','topics','hotTopics', 'rencentTopics','activities','themes'));
    }

   /* public function explore($filter= 'default'){
        $filter = explode('-',trim($filter));

        $topics = app('App\Repositories\TopicRepositories')->fetchTopicsWithFilter($filter);
        $hotTopics = app('App\Repositories\TopicRepositories')->fetchThreeHot(5);
        return view('explore',compact('topics','filter','hotTopics'));
    }*/


    /*public function square(){
        $focusIds = [];
        if (Auth::check()){
            $focusIds = app('App\Repositories\ThemeRepository')->fetchFocusId(Auth::id());
        }
        $themes = app('App\Repositories\ThemeRepository')->fetchThemesWithTopics(6,2);
        $hotThemes = app('App\Repositories\ThemeRepository')->fetchHotThemes(10);
        return view('square', compact('themes', 'focusIds', 'hotThemes'));
    }*/
}

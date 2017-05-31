<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\ThemeMsg;
use App\Models\Topic;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ThemeController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>['chat','show_rooms']]);
    }

    public function index(Theme $theme){
      /*  $t = Theme::find(1);
        dd($t->topics);*/

        $themes = $theme->getThemeAndTopicWithLimit(2,6);
        $hotThemes = $theme->getHotsTheme(8);
        return view('themes.index', compact('themes', 'hotThemes'));
    }

    public function show($id){
        $theme = Theme::findOrFail($id);

        $topic = app(Topic::class);
        $recommend = $topic->fetchThemeTopicesWithFilter($theme->id,'excellent',3);
        $newTopics = $topic->fetchThemeTopicesWithFilter($theme->id,'default',5);
        $topics = $topic->fetchThemeTopicesWithFilter($theme->id, 'reply', 5);
        $celebritiesAll = Topic::where('theme_id',$id)->groupBy('user_id')->orderBy('user_count', 'desc')->with('user')
            ->select(\DB::raw('count(*) as user_count, user_id'))->get()->pluck('user');
        return view('themes.show',compact('theme', 'recommend', 'topics', 'newTopics','celebritiesAll'));
    }

    public function show_topic($id){
        $theme = Theme::findOrFail($id);

        $topic = app(Topic::class);
        $topics = $topic->getThemeTopicsWithFilter($theme->id, 'topic-recent', 6);
        $hotTopics = $topic->fetchThemeTopicesWithFilter($theme->id, 'topic-reply', 6);
        return view('themes.show_topic',compact('theme',  'topics','hotTopics'));
    }

    public function show_video($id){
        $theme = Theme::findOrFail($id);

        $topic = app(Topic::class);
        $topics = $topic->getThemeTopicsWithFilter($theme->id, 'topic-video', 15);
        $videos = $topics->splice(3);
        $topVideos = $topics;
        return view('themes.show_video',compact('theme', 'videos', 'topVideos'));
    }

    public function fetch_theme(Request $request){
        $data = Theme::select(['id','name'])->where("name",'like', '%'.$request->query('q').'%')->get();
        return response()->json(['status'=>'success', 'data'=>$data, 'msg'=>'获取主题成功']);
    }


    public function show_rooms($id){
        $user= Auth::user();
        $theme = Theme::findOrFail($id);
        $messages = ThemeMsg::where('theme_id', $theme->id)->orderBy("created_at","asc")->with("user")->get();
        return view('themes.room',compact('theme','messages','user'));
    }

    public function chat(Request $request){
        //event(new DormChatEvent("sadasdasd", 'test1'));
        $user= Auth::user();
        $roomId = $request->input('theme');
        $theme = Theme::findOrFail($roomId);
        if ($theme->is_store){
            ThemeMsg::create(['user_id'=>$user->id, 'theme_id'=>$roomId, 'message'=>$request->input('msg')]);
        }


        $data = [
            'event'=>"theme-Room:".$roomId,
            'data'=>[
                'user'=>$user,
                'msg'=>$request->input('msg')
            ],
            'type'=>"chat"
        ];
        Redis::publish('noServer',json_encode($data));
    }

    public function updateNum(Request $request){
        $theme = Theme::findOrFail($request->input('id'));
        $theme->focus_count = $request->input('num');
        $theme->save();
        return response()->json(['status'=>200,'msg'=>'success','data'=>[]]);
    }
    public function updateMsgStore(Request $request){
        $theme = Theme::findOrFail($request->input('id'));
        $theme->is_store = $request->input('store');
        $theme->save();
        return response()->json(['status'=>200,'msg'=>'success','data'=>[]]);
    }
}

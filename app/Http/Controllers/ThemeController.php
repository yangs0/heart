<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Topic;
use App\Repositories\ThemeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function __construct(){
       // $this->middleware('auth');
    }

    public function index(Theme $theme){
      /*  $t = Theme::find(1);
        dd($t->topics);*/

        $themes = $theme->getThemeAndTopicWithLimit(2,6);
        $hotThemes = $theme->getHotsTheme(8);
        return view('themes.index', compact('themes', 'hotThemes'));
    }

    public function show($id,$filter = 'default'){
        $theme = Theme::findOrFail($id);

        $topic = app('App\Models\Topic');
        $recommend = $topic->fetchThemeTopicesWithFilter($theme->id,'excellent',3);
        $newTopics = $topic->fetchThemeTopicesWithFilter($theme->id,'default',5);
        $topics = $topic->getThemeTopicsWithFilter($theme->id, 'noreply', 3);
        return view('themes.show2',compact('theme', 'recommend', 'topics', 'newTopics'));
    }

    public function fetch_theme(Request $request){
        $data = Theme::select(['id','name'])->where("name",'like', '%'.$request->query('q').'%')->get();
        return response()->json(['status'=>'success', 'data'=>$data, 'msg'=>'获取主题成功']);
    }
}

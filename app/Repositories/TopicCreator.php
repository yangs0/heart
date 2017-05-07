<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-1-23
 * Time: 上午11:31
 */

namespace App\Repositories;


use App\Models\Notices;
use App\Models\Theme;
use App\Models\Topic;
use Carbon\Carbon;
use erusev\parsedown\Parse;
use Illuminate\Support\Facades\Auth;

class TopicCreator{

    public function create($data){ //基本架构
//        $topic = Topic::create($data);
//        \DB::table('themes')->where("id",$topic->theme_id)->increment('topics_count');
//        return $topic;

        //最后加一个检验是否重复提交 function isDuplicate
        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        $data['resolved_content'] = Parse::text(strip_tags($data['content']));
        $data['summary'] = Topic::makeSummary($data['resolved_content']);
        $topic = Topic::create($data);

        Notices::createNoticeToFollowers(Auth::user(),[
            'formId'=>Auth::id(),
            'type'=>'topic',
            "line_id"=>$topic->id
        ]);
        Auth::user()->increment('topic_count', 1);
        return route('topic.show',$topic->id); //就返回路径吧
    }

    /*public function fetchTopicsWithFilter($filter,$count = 8){
        if (isset($filter[1])){
            return Topic::with('theme')->applyFilter($filter[0])->timeFilter($filter[1])->paginate($count);
        }else{
            return Topic::with('theme')->applyFilter($filter[0])->paginate($count);
        }
    }

    public function fetchThreeHot($filter,$count = 5){
        return Topic::with('theme')->applyFilter('default')->recentDays(3)->take($count)->get();
    }

    public function fetchTopicWitHFilterById($id, $filter, $count = 8){
        if (isset($filter[1])){
            return Topic::where('theme_id',$id)->applyFilter($filter[0])->timeFilter($filter[1])->paginate($count);
        }else{
            return Topic::where('theme_id',$id)->applyFilter($filter[0])->paginate($count);
        }
    }*/

    /*public function fetchTopicById($id){
        return Topic::with(['user','theme'])->findOrFail($id);
    }

    public function fetchTopicsWithFilterByThemeId($id, $filter = 'default'){
        return Topic::where('theme_id', $id)->applyFilter($filter);
    }

    public function fetchTopicsWithFilterByUserId($id, $filter = 'default'){
        return Topic::where('user_id', $id)->applyFilter($filter);
    }*/

}
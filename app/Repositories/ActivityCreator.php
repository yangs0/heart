<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-1-23
 * Time: 上午11:31
 */

namespace App\Repositories;

use App\Models\Activity;
use Carbon\Carbon;
use erusev\parsedown\Parse;
use Illuminate\Support\Facades\Auth;

class ActivityCreator{

    public function create($data){ //基本架构
//        $topic = Topic::create($data);
//        \DB::table('themes')->where("id",$topic->theme_id)->increment('topics_count');
//        return $topic;
        
        //最后加一个检验是否重复提交 function isDuplicate
        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now()->toDateTimeString();
        $data['updated_at'] = Carbon::now()->toDateTimeString();
        $data['resolved_content'] = Parse::text(strip_tags($data['content']));

        $activity = Activity::create($data);
        if (! $activity) {
            dd($activity->getErrors());
        }

        return route('activities.show',$activity->id); //就返回路径吧
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-2-23
 * Time: 下午10:18
 */

namespace App\Models\Traits;


use App\Models\Theme;
use App\Models\Topic;

trait ThemeHelper{

    public function getThemeAndTopicWithLimit($topicLimit, $themeLimit){
        /*return $this->with([
            'topics' => function ($query) use($topicLimit) {
                return $query->select('id', 'title')->take(100);
        }])->withoutBanned()->orderBy('focus_count', 'desc')->select('id','name', 'focus_count')->paginate($themeLimit);
   */
        return $this->withoutBanned()->orderBy('focus_count', 'desc')->select('id','name', 'intro','focus_count')->get()
            ->map(function ($theme) use ($topicLimit){
                $theme->topics = Topic::where('theme_id',$theme->id)->take($topicLimit)->select('id','title')->get();
                return $theme;
        });
    }

    public function getHotsTheme($limit){
        return $this->withoutBanned()->orderBy('topics_count', 'desc')->select('id','name')->take($limit)->get();
    }
}
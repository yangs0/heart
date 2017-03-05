<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 16-12-23
 * Time: 下午8:19
 */

namespace App\Repositories;


use App\Models\Theme;

class ThemeRepository{

    public function fetchIndexThemesWithTopics($theme_count, $topic_count, $filter = null){

        /*return Theme::applyFilter($filter)->get()->map(function ($theme) use ($topic_count){
             $theme->topics = Topic::where('theme_id',$theme->id)->take($topic_count)->select('id','title')->get();
             return $theme;
         });*/

        return Theme::applyFilter($filter)->with(['topics' => function ($query) use($topic_count){
            $query->take($topic_count);
        }])->paginate($theme_count);
    }

    public function fetchFocusId($id){
        $ids = \DB::table('focus')->where("user_id",$id)->select('theme_id')->get()->all();
        return array_pluck($ids, 'theme_id');
    }
    /*public function fetchThemesWithFilter($filter, $count){
        return Theme::applyFilter($filter)
    }*/
    public function fetchHotThemes($count){
        return Theme::applyFilter('hot')->select(['id', 'name'])->take($count)->get();
    }

    /* public function getThemesWithColums($count, $columns = array('*')){
         return $this->theme->orderBy('follower_count', 'DESC')->paginate($count,$columns);
     }*/

    /*public function getThemeArticlesWithColums($columns = array('*'), $theme_id, $limit = 20)
    {
        return $this->where('id', '=', $theme_id)->article()
                    ->with('user', 'themes')
                    ->paginate($limit, $columns);
    }*/

    /*public function getTagsWithFilter($filter = 'default', $columns = array('*'), $count =20){
        return $this->theme->applyFilter($filter)->recent()->paginate($count, $columns);
    }

    public function getTagsExcept($themes, $count){
        return $this->theme->withoutBanned()->whereNotIn('id',$themes)->take($count)->get();
    }*/

  /*  public function getHotThemes($count = 30){
        return $this->theme->orderBy('follower_count', 'DESC')->paginate($count,['id', 'name']);
    }*/
}
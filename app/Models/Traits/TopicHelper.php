<?php

/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-2-22
 * Time: 下午8:27
 */
namespace App\Models\Traits;
trait TopicHelper{

    public function getTopicShow($id){
        return $this->newQuery()->with([
            'user'=>function($query){
                $query->select('id','name','intro','topics_count');
            },
            'user.topics'=>function($query){
                $query->orderBy('created_at', 'desc')->take(3);
            },
            'theme'=>function($query){
                $query->select('id','name');
        }])->findOrFail($id);
    }

    public function getTopicsWithFilter($filter, $limit){
        $filter = $this->getTopicFilter($filter);

        return $this->applyFilter($filter)
            ->with('user','theme')   //这边就不进行字段限制了。
            ->paginate($limit);
    }

    public function getThemeTopicsWithFilter($themeId, $filter, $limit){
        $filter = $this->getTopicFilter($filter);

        return $this->applyFilter($filter)
            ->where("theme_id", $themeId)
            ->with('user','theme')   //这边就不进行字段限制了。
            ->paginate($limit);
    }
    public function getThemeTopicsWithFilterByType($themeId, $type, $filter, $limit){
        $filter = $this->getTopicFilter($filter);

        return $this->applyFilter($filter)
            ->where("theme_id", $themeId)
            ->where("type", $type)
            ->with('user','theme')   //这边就不进行字段限制了。
            ->paginate($limit);
    }

    public function fetchThemeTopicesWithFilter($themeId, $filter, $limit){
        return $this->applyFilter($filter)
            ->where("theme_id", $themeId)
            ->select('id','title','figure')
            ->take($limit)->get();
    }


    public function fetchUserTopicWithFilter($userId, $filter, $limit){
        return $this->applyFilter($filter)
            ->where("user_id", $userId)
            ->select('id','title', 'created_at')
            ->take($limit)->get();
    }


    public function getUserTopicWithFilter($userId, $filter, $limit){
        return $this->applyFilter($filter)
            ->where("user_id", $userId)
            ->select('id','title','type','vote_count','reply_count', 'created_at')
            ->paginate($limit);
    }
}
<?php

namespace App\Models;

use App\Models\Traits\ThemeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Theme extends Model{
    use ThemeHelper;

    public $fillable = [
        'name',
        'intro',
        'cover',
        'color'
    ];
    public $timestamps = false;

    public function topics(){
        return $this->hasMany(Topic::class);
    }


    public function scopeApplyFilter($query, $filter){
        $query = $query->withoutBanned();
        switch ($filter) {
            case 'hot':
                return $query->orderBy('focus_count', 'desc');
                break;
            case 'user_focus':
                //$ids = Auth::user()->focus()->select('id')->get();
                $ids = app('App\Repositories\ThemeRepository')->fetchFocusId(Auth::id());
                return $query->whereIn('id',$ids);
                break;
            default:
                return $query;
                break;
        }
    }



   /* public function scopeFetchTopicById($query, $id,$count){
        return Topic::where('theme_id',$id)->take($count)->select('id','title')->get();
    }*/

    public function scopeWithoutBanned($query){
        return $query->where('is_banned', '=', 'no');
    }

    public function scopeRecent($query){
        return $query->orderBy("created_at", 'DESC');
    }
}

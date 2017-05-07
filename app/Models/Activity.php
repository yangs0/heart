<?php

namespace App\Models;

use App\Models\Traits\ActivityHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use ActivityHelper;
    public $guarded = [''];
    public $timestamps = false;
    public $dates = ['created_at', 'updated_at','deleted_at','start','end'];

    public function replies(){
        return $this->morphMany(Reply::class, 'replable');
    }

    public function participants(){
       return $this->belongsToMany(User::class, "participates");
    }

    public function chatRoom(){
        return $this->hasOne(Room::class);
    }



    public function getActivityFilter($request_filter)
    {
        $filters = ['all', 'ing', 'ed'];
        if (in_array($request_filter, $filters)) {
            return $request_filter;
        }
        return 'default';
    }

    public function scopeApplyFilter($query, $filter)
    {
        $query = $query->withoutBanned();
        switch ($filter) {
            case 'ing':  //推荐的topic,,is_excellent
                $now = Carbon::now();
                return $query->where([['start', '<', $now],['end', '>', $now]]);
                break;
            case 'ed':
                return $query->where('end',"<", Carbon::now());
                break;
            default:
                return $query->orderBy('created_at', 'desc');
                break;
        }
    }

    public function scopeWithoutBanned($query){
        return $query->where('is_banned', '=', 'no');
    }


    public function getUrl(){
        return route("activities.show", $this->id);
    }
}

<?php

namespace App\Models;

use App\Models\Traits\TopicHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use TopicHelper;

    public $guarded = [''];
    public $timestamps = false;
    public $dates = ['created_at', 'updated_at','deleted_at'];

    public function theme(){
        return $this->belongsTo(Theme::class);
    }

   /* public function replies()
    {
        return $this->hasMany(Reply::class);
    }*/
    public function replies()
    {
        return $this->morphMany(Reply::class, 'replable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function makeSummary($body){
        $html = $body;
        $excerpt = trim(preg_replace('/\s\s+/', ' ', strip_tags($html)));
        return str_limit($excerpt, 200);
    }

    public function getTopicFilter($request_filter)
    {
        $filters = ['excellent', 'vote', 'noreply'];
        if (in_array($request_filter, $filters)) {
            return $request_filter;
        }
        return 'default';
    }

    public function scopeApplyFilter($query, $filter)
    {
        $query = $query->withoutBanned()->orderBy('created_at', 'desc');
        switch ($filter) {
            case 'excellent':  //推荐的topic,,is_excellent
                return $query->where('is_excellent', 'yes');
                break;
            case 'vote':
                return $query->orderBy('vote_count', 'desc');
                break;
            case 'noreply':
                return $query->orderBy('reply_count','desc');
                break;
            default:
                return $query;
                break;
        }
    }

    public function scopeTimeFilter($query, $filter){
        switch ($filter) {
            case 'week':
                return $query->whereRaw("(`created_at` > '".Carbon::parse("-7 days")->toDateString()."')");
                break;
            case 'month':
                return $query->whereRaw("(`created_at` > '".Carbon::parse("-1 months")->toDateString()."')");
                break;
            case 'year':
                return $query->whereRaw("(`created_at` > '".Carbon::parse("-1 year")->toDateString()."')");
                break;
            default:
                return $query;
                break;
        }
      //return $query->whereRaw("(`created_at` > '".Carbon::parse($days)->toDateString()."')");
    }


    public function scopeWithoutBanned($query){
        return $query->where('is_banned', '=', 'no');
    }

    public function scopeRecentDays($query, $days){
        return $query->whereRaw("(`created_at` > '".Carbon::today()->subDay($days)->toDateString()."')");
    }


    public function scopeJoinThemesFind($query, array $theme){
        return $query->join('article_theme', 'articles.id', '=', 'article_theme.article_id')->whereIn('article_theme.theme_id', $theme);
    }

    public function scopeWhose($query, $user_id){
        return $query->where('user_id', '=', $user_id)->with('themes');
    }

    public function scopeRandom($query){
        return $query->orderByRaw("RAND()");
    }


    public function scopeRecent($query){
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeVote($query){
        return $query->orderBy('vote_count', 'desc');
    }
    public function scopeBrowse($query){
        return $query->orderBy('browse_count', 'desc');
    }


}

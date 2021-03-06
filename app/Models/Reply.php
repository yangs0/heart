<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use SoftDeletes;
    public $guarded = [''];

  /*  public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }*/

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replable()
    {
        return $this->morphTo();
    }

    public function getRecentComment($id, $limit=8){
        return $this->newQuery()->where('user_id', $id)->paginate($limit);
    }
}

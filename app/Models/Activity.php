<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $guarded = [''];
    public $timestamps = false;
    public $dates = ['created_at', 'updated_at','deleted_at'];

    public function replies()
    {
        return $this->morphMany(Reply::class, 'replable');
    }

    public function getUrl(){
        return route("activities.show", $this->id);
    }
}

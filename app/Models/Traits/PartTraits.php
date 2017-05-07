<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-2-26
 * Time: 下午11:37
 */

namespace App\Models\Traits;

use App\Models\Activity;
use App\Models\Participates;

trait PartTraits
{
    public function participants(){
        return $this->belongsToMany(Activity::class,'participates', 'user_id', 'activity_id');
    }

    public function isParting($activity)
    {
        return $this->participants->contains($activity);
    }

    public function unPart($activity)
    {
        if (!is_array($activity)) {
            $activity = compact('activity');
        }

        $this->participants()->detach($activity);
    }


    public function part($activity){
        if (!is_array($activity)) {
            $activity = compact('activity');
        }

        $this->participants()->sync($activity, false);
    }
}
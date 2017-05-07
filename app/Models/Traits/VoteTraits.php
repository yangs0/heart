<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-2-26
 * Time: 下午11:37
 */

namespace App\Models\Traits;

use App\Models\Topic;

trait VoteTraits
{
    public function vote($topic){
        if (!is_array($topic)) {
            $topic = compact('topic');
        }

        $this->votings()->sync($topic, false);
    }

    public function unVote($topic)
    {
        if (!is_array($topic)) {
            $topic = compact('topic');
        }
        $this->votings()->detach($topic);
    }

    public function isVoting($topic){
        return $this->votings->contains($topic);
    }


    public function votings(){
        return $this->belongsToMany(Topic::class, 'votes', 'user_id', 'topic_id');
    }
}
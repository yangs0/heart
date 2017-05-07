<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participates extends Model{
    public $guarded = [''];

    public function users(){
        $this->belongsTo(User::class);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ten_year
 * Date: 17-2-9
 * Time: 下午4:28
 */

namespace App\Repositories;


use App\Models\Dorm;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class DormRepository{

    public function create($arg){
        $data =  [
            "name" => $arg['name'],
            "avatar" => $arg['img'],
            "sex" => $arg['sex'],
            "limit_count" => $arg['count'],
            "rules" => $arg['rule'],
            "user_id" => Auth::id(),
        ];
        $dorm = Dorm::create($data);
        $dorm->members()->attach(Auth::id());
        return $dorm;
    }

    public function dormInfoUpdate($id, $data){
        $dorm = Dorm::findOrFail($id);

        return $dorm->update($data);
    }
    /*
     *  $table->increments('id');
            $table->string('name',45);
            $table->string('avatar')->default('/img/1c,jpg');
            $table->enum('sex',['boy','girl','no'])->default('no');
            $table->tinyInteger('limit_count')->default(6);
            $table->string('rules');
            $table->timestamps();*/
}
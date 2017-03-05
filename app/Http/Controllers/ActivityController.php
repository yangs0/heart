<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(){
        return view('activities.index');
    }

    public function show($id){
        $activity =Activity::findOrFail($id);
        $replies = $activity->replies()->with('user')->paginate(6);
        return view('activities.show', compact('activity', 'replies'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(ActivityRequest $request){
        $data = $request->except('_token'); //文件处理
        if ($request->hasFile('cover')){
            $file = $request->file('cover');
            if ($file->isValid()){
                //文件存储打话， 之后可以将其封装起来
                $data['cover'] = $request->file('cover')->storeAs('banner',uniqid("user_id_").'.'.$file->getClientOriginalExtension(),'uploads');//url('uploads/'.$data['figure']->store('avatars','uploads'))
            }
        }
        //dd(Request::isValidFile($data['figure']));
        return redirect(app('App\Repositories\ActivityCreator')->create($data));

    }
}

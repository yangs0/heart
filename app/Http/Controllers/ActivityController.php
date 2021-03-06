<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller{
    public function __construct(){
        $this->middleware('auth',['only'=>['create','store','doPart']]);
    }
    public function index($type = null){
        if ($type){
            $proActivity = Activity::where('end', '>', Carbon::now())->orderBy("part_count",'desc')->take(3)->get();
            $activities = app(Activity::class)->getActivityWithFilter($type, 12);
            return view('activities.index', compact('activities','proActivity'));
        }
        return redirect(route('activities.display', 'all'));
    }

    public function show($id){
        $activity =Activity::with("participants")->findOrFail($id);
        $participants = $activity->participants;

        $replies = $activity->replies()->with('user')->paginate(6);
        return view('activities.show', compact('activity', 'replies','participants'));
    }

    public function create(){
        return view('activities.create');
    }


    public function store(ActivityRequest $request){
        $data = $request->except('_token'); //文件处理
        if ($request->hasFile('cover')){
            $file = $request->file('cover');
            if ($file->isValid()){
                //文件存储打话， 之后可以将其封装起来
                $data['cover'] = '/uploads/'.$request->file('cover')->storeAs('images',uniqid(Auth::id()).'.'.$file->getClientOriginalExtension(),'uploads');//url('uploads/'.$data['figure']->store('avatars','uploads'))
            }
        }
        //dd(Request::isValidFile($data['figure']));
        return redirect(app('App\Repositories\ActivityCreator')->create($data));
    }


    public function doPart($id)
    {
         $activity = Activity::findOrFail($id);

        if (Auth::user()->isParting($id)) {
           // Auth::user()->unPart($id);
            return response()->json(['status'=>'200','data'=>[], 'msg'=>'亲，您已经报名参加了哦']);
        } else {
            Auth::user()->part($id);
        }
        //Auth::user()->update(['follower_count' => $user->followers()->count()]);

        $activity->increment('part_count');
        return response()->json(['msg'=>"success"]);
        //return redirect(route('users.show', $id));
    }

}

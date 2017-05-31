<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Room;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }
    function user(){
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    function bannedUser(Request $request){
        $user = User::findOrFail($request->input('id'));
        if ($user->is_banned == 'yes'){
            $user->is_banned = 'no';
        }else{
            $user->is_banned = 'yes';
        }
        $user->save();
        return response()->json(['status',[], 'msg'=>'success']);
    }

    function bannedTopic(Request $request){
        $topic = Topic::findOrFail($request->input('id'));
        if ($topic->is_banned == 'yes'){
            $topic->is_banned = 'no';
        }else{
            $topic->is_banned = 'yes';
        }
        $topic->save();
        return response()->json(['status',[], 'msg'=>'success']);
    }
    function excellentTopic(Request $request){
        $topic = Topic::findOrFail($request->input('id'));
        if ($topic->is_excellent == 'yes'){
            $topic->is_excellent = 'no';
        }else{
            $topic->is_excellent = 'yes';
        }
        $topic->save();
        return response()->json(['status',[], 'msg'=>'success']);
    }

    function topic(){
        $topics = Topic::with('user','theme')->get();
        return view('admin.topic', compact('topics'));
    }

    function activity(){
        $activities = Activity::with('user')->get();
        return view('admin.activities', compact('activities'));
    }

    function room(){
        $rooms = Room::with('activity')->get();
        return view('admin.room', compact('rooms'));
    }
    function bannedRoom(Request $request){
        $room = Room::findOrFail($request->input('id'));
        if ($room->is_banned == 'yes'){
            $room->is_banned = 'no';
        }else{
            $room->is_banned = 'yes';
        }
        $room->save();
        return response()->json(['status',[], 'msg'=>'success']);
    }
}

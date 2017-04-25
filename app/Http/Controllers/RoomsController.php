<?php

namespace App\Http\Controllers;

use App\Models\ChatMsg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class RoomsController extends Controller
{
    public function show($id){
        /* $dorm = Dorm::with('members')->findOrFail($id);
         $members = $dorm->members;*/

        $messages = ChatMsg::where('room_id', 1)->orderBy("created_at","asc")->with("user")->get();

        return view('rooms.show',compact('dorm','members', 'messages'));
    }

    public function chat(Request $request){
        //event(new DormChatEvent("sadasdasd", 'test1'));
        $user= Auth::user();
        ChatMsg::create(['user_id'=>$user->id, 'room_id'=>1, 'message'=>$request->input('msg')]);

        $data = [
            'event'=>"preVersion",
            'data'=>[
                'user'=>$user,
                'msg'=>$request->input('msg')
            ]
        ];
        Redis::publish('chatRoom',json_encode($data));
    }
}

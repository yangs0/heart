<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ChatMsg;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class RoomsController extends Controller
{
    public function show($id){
        /* $dorm = Dorm::with('members')->findOrFail($id);
         $members = $dorm->members;*/

        $room = Room::findOrFail($id);
        if ($room->count()){
            $messages = ChatMsg::where('room_id', $id)->orderBy("created_at","asc")->with("user")->get();

            return view('rooms.show',compact('room','messages'));
        }else{
            return abort(404);
        }

    }

    public function chat(Request $request){
        //event(new DormChatEvent("sadasdasd", 'test1'));
        $user= Auth::user();
        $roomId = $request->input('room');
        ChatMsg::create(['user_id'=>$user->id, 'room_id'=>$request->input('room'), 'message'=>$request->input('msg')]);

        $data = [
            'event'=>"chat-Room:".$roomId,
            'data'=>[
                'user'=>$user,
                'msg'=>$request->input('msg')
            ]
        ];
        Redis::publish('chatRoom',json_encode($data));
    }


    public function create($id){
        $activity = Activity::with('chatRoom')->findOrFail($id);
        $room = $activity->chatRoom;
        if (!$room){
            $room= $activity->chatRoom()->create([
                'name' => uniqid(),
                'end_at'=>$activity->end
            ]);
        }

        return response()->json(['status'=>200,'data'=>$room,'msg'=>'success']);
    }
}

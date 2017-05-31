<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Notices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function letter(){
        Letter::where('user', Auth::id())->update(['is_read'=>1]);
        $letters = Letter::where("user",Auth::id())->groupBy("friend")->orderBy('is_read','asc')->orderBy('created_at','asc')->get();
        return view("user.letter", compact('letters'));
    }

    public function sendLetter(Request $request){
        $validator = Validator::make($request->all(), [
            'content' => 'bail||required',
            'user_id' => 'bail|required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>401,"data"=>[],'msg'=>$validator->errors()]);
        }
        $user_id = $request->input('user_id');
        $content = $request->input('content');
        Letter::create([
            'user'=>Auth::id(),
            'friend'=>$user_id,
            'from_id'=>Auth::id(),
            'to_id'=>$user_id,
            'msg'=>$content,
            'is_read'=>1
        ]);
        Letter::create([
            'user'=>$user_id,
            'friend'=>Auth::id(),
            'from_id'=>Auth::id(),
            'to_id'=>$user_id,
            'msg'=>$content
        ]);
        $data = [
            'event'=>"letters",
            'toUser'=>$user_id,
            'type'=>"letter"
        ];
        Redis::publish('noServer',json_encode($data));

        return response()->json(['status'=>200,"data"=>[],'msg'=>"发送成功"]);
    }

    public function letterChat($id){
        $toUser = User::findOrFail($id);
        $letters = Letter::where([ ['from_id', '=', $id], ['to_id', '=', Auth::id()],["user",'=',Auth::id()]])
            ->orWhere([['to_id', '=', $id], ['from_id', '=', Auth::id()],["user",'=',Auth::id()]])->with(['toUser','fromUser'])->get();
        return view("user.letter_chat",compact('letters','toUser'));
    }


    public function notice(){
        $notices = Notices::where('user_id',Auth::id())->with('fromUser')->get();
        return view('user.notice', compact('notices'));
    }

    public function read(Request $request){
        $id = $request->input('id');
        if ($id){
            Notices::where("id", $id)->where("user_id", Auth::id())->update(["is_read"=>1]);

        }else{
            Notices::where("user_id", Auth::id())->update(["is_read"=>1]);
        }
        return response()->json(['status'=>200, 'msg'=>"success", 'data'=>[]]);
    }
}

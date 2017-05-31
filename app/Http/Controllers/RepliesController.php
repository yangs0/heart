<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Models\Activity;
use App\Models\Reply;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //有待优化, 未区分活动或者话题
    public function store(ReplyRequest $request)
    {

        $data = $request->all();
        if ($data['type'] == 'topic'){
            $morphTo = Topic::findOrFail($data['morph_id']);
        }elseif ($data['type'] == 'activity'){
            $morphTo = Activity::findOrFail($data['morph_id']);
        }else{
            abort(403);
        }
        //$reply = Reply::create($data);
        $reply = $morphTo->replies()->create(['content'=>$data['content'], 'user_id'=>\Auth::id()]);
        // Add the reply user
        $morphTo->last_reply_user_id = \Auth::id();
        $morphTo->reply_count++;
        $morphTo->updated_at = Carbon::now()->toDateTimeString();
        $morphTo->save();
        \Auth::user()->increment('reply_count', 1);
        return response()->json(['status'=>200, 'data'=>$reply, 'msg'=>'操作成功']);
       // return app('Phphub\Creators\ReplyCreator')->create($this, $request->except('_token'));
    }

    public function vote($id)
    {
        $reply = Reply::findOrFail($id);
        $type = app('Phphub\Vote\Voter')->replyUpVote($reply);

        return response([
            'status'  => 200,
            'message' => lang('Operation succeeded.'),
            'type'    => $type['action_type'],
        ]);
    }
}

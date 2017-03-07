<?php

namespace App\Http\Controllers;

use App\Events\DormChatEvent;
use App\Models\ChatMsg;
use App\Models\Dorm;
use App\Repositories\DormRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class DormController extends Controller
{
    protected $repositories;
    public function __construct(DormRepository $repositories){
       // $this->middleware('auth', ['except'=>['index']]);
        $this->repositories = $repositories;
    }


    public function index(){
        $dorms = Dorm::all();
        return view('dorms.index',compact('dorms'));
    }

    public function show($id){
        $dorm = Dorm::with('members')->findOrFail($id);
        $members = $dorm->members;

        $messages = ChatMsg::where('dorm_id', $dorm->id)->get();
        return view('dorms.show',compact('dorm','members', 'messages'));
    }

    public function edit($id){
        $dorm = Dorm::findOrFail($id);
        return view('dorms.edit', compact('dorm'));
    }


    public function create(){
        return view('dorms.create');
    }
    public function update(Request $request, $id){
        $data = [
            'limit_count'=>$request->input('count'),
            'sex'=>$request->input('sex'),
            'rules'=>$request->input('rules')
        ];

         $this->repositories->dormInfoUpdate($id, $data);
        return redirect()->route('dorm.show', $id);
    }

    public function store(Request $request){
        $dorm = $this->repositories->create($request->except('_token'));
        return redirect(route('dorm.show',$dorm->id));
    }

    public function chat(Request $request){
        //event(new DormChatEvent("sadasdasd", 'test1'));
        ChatMsg::create(['user_id'=>\Auth::id(), 'dorm_id'=>$request->input('dorm'), 'message'=>$request->input('msg')]);

        $data = [
            'event'=>"preVersion",
            'data'=>[
                'user'=>Auth::user(),
                'msg'=>$request->input('msg')
            ]
        ];
        Redis::publish('chatRoom',json_encode($data));
    }

    public function required(){
        return view('dorms.require');
    }
}

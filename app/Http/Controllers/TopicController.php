<?php

namespace App\Http\Controllers;


use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use App\Models\User;
use Carbon\Carbon;
use erusev\parsedown\Parse;
use erusev\parsedown\Parsedown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class TopicController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['only'=>['doVote']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.

     * @return \Illuminate\Http\Response
     */

    /*
     *
     * if ($file->isValid()) {

                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg

                // 上传文件
                $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                var_dump($bool);

            }*/
    // 验证规则加入Request套餐  withValidator
    public function store(TopicRequest $request){
        $data = $request->except('_token'); //文件处理
        if ($request->hasFile('figure')){
            $file = $request->file('figure');
            if ($file->isValid()){
                //文件存储打话， 之后可以将其封装起来
                $data['figure'] = $request->file('figure')->storeAs('avatars',uniqid("user_id_").'.'.$file->getClientOriginalExtension(),'uploads');//url('uploads/'.$data['figure']->store('avatars','uploads'))
            }
        }
        //dd(Request::isValidFile($data['figure']));
        return app('App\Repositories\TopicCreator')->create($data);



        //之后写存储方法
        /*if ($validator->fails()){
            return redirect('###')->withErrors($validator)->withInput();
        }else{
            return "###";
        }*/

       /* if ($request->input('type') === 'reprint' && (empty($request->input('source')) || empty($request->input('sourceUrl')))){
            return \Redirect::back()->withInput()->withErrors(['type'=>'文章类型若为 转载， 请填写转载来源.']);
        }

        $data = $request->except('tags','_token', 'image', 'type');
        $data['head_img'] = $request->input('image');
        $data['theme_id'] = $request->input('tags');
        $data['user_id'] = Auth::id();
        $data['resolved_content'] = Parse::text($request->input('content'));
        $data['created_at'] =  $data['updated_at'] = Carbon::now()->toDateTimeString();

        $topic = $this->repositories->create($data);
        return redirect(route('topic.show',$topic->id));*/
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $topic = app(Topic::class)->getTopicShow($id);
        $user = $topic->user;
        $mayCareTopics = app(Topic::class)->fetchThemeTopicesWithFilter($topic->theme_id,'vote',6);
        $replies = $topic->replies()->with('user')->paginate(6);
        return view('topics.show', compact('topic', 'user', 'mayCareTopics','replies'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function doVote($id){
        $topic = Topic::findOrFail($id);
//dd(\Auth::user()->followers());
        if (\Auth::user()->isVoting($id)) {
            \Auth::user()->unVote($id);
        } else {
            \Auth::user()->vote($id);
        }
        dd("ok");
        //return redirect(route('themes.show', $id));
        //return response(['status' => 200]);
       // return response()->json(['status'=>'200','data'=>[], 'msg'=>$msg]);
    }



}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');// 首页
//用户登录/注册/密码重置
Route::get("/login/github", 'UserController@socialLogin')->name("login.github");
Route::get("/login/black/{type}", 'UserController@socialCallBack');
Auth::routes();
//帐号激活
Route::get("/active/verify/{token}/{email}", "UserController@activeUser")->name("email.verify");

Route::get('/themes', 'ThemeController@index');  //主题广场-- （活动列表尚为完成，尚有链接，图像细节尚未补全）
Route::post('/themes/user_count', 'ThemeController@updateNum')->name('theme.user_count');
Route::post('/themes/chat', 'ThemeController@chat')->name('theme.chat');
Route::get('/themes/{id}', 'ThemeController@show')->name('theme.show');  //主题  (区分topic 类别，尚未完成)
Route::get('/themes/{id}/topic', 'ThemeController@show_topic')->name('theme.show_topic');  //主题  (区分topic 类别，尚未完成)
//Route::get('/themes/{id}/video', 'ThemeController@show_video')->name('theme.show_video');  //主题  (区分topic 类别，尚未完成)
Route::get('/themes/{id}/room', 'ThemeController@show_rooms')->name('theme.show_rooms');

//topic.show, 类别区分 尚未完成，
//topic.create  右侧部分尚未玩成
//topic.create 这是目前比较满意打部分，之后可以对图像处理部分进行封装
//topic.edit  这部分现在还完全没做，完成的时候记得加个update
//topic.vote 点赞 ，JS等功能尚未实现,, 功能尚未验证
Route::post('/topic/{id}/vote', 'TopicController@doVote')->name('topics.doVote');
Route::resource('topic', 'TopicController', ['only' => ['create', 'show','store','edit']]);  //话题创建/显示/存储/修改

//评论 --尚未补全
Route::post('/replies', 'RepliesController@store')->name('replies.store');

// *************************以下部分暂且没用， 或属于严重未完成部分*****************************************************
Route::get('/test', 'TestController@aaaa');
Route::post('/api/topic/{id}/vote', "TopicController@doVote");
//Route::post('/api/chat', 'DormController@chat');


//宿舍部分，尚未完成
Route::post('/rooms/create/{id}', 'RoomsController@create')->name('rooms.create');
Route::post('/rooms/chat', 'RoomsController@chat')->name('chat.msg');
//Route::get('/rooms/{id}/require', 'DormController@required');

Route::resource('/rooms', 'RoomsController', ['only'=>['show','test']]);

//活动功能好像还什么都没做呢
Route::get('/activities/show_{type?}', 'ActivityController@index')->name("activities.display");
Route::post('/activities/{id}/part', 'ActivityController@doPart')->name('activities.part');
Route::resource('activities', 'ActivityController', ['only'=>['index','show','create','store','edit']]); //活动



/*-------------user private letter------------------*/

Route::get("/users/letter","NoticeController@letter")->name('users.letter');
Route::post("/users/letter/send","NoticeController@sendLetter")->name('users.letter.send');

Route::get("/users/letter/{id}","NoticeController@letterChat")->name('users.chat');
Route::get("/users/notice","NoticeController@notice")->name('users.notice');
Route::post("/users/notice/read","NoticeController@read")->name('users.notice.read');

//users.doFollow 用户关注 ，JS等功能尚未实现,, 功能尚未验证
Route::post('/users/follow/{id}', 'UserController@doFollow')->name('users.doFollow');

//用户第三方登录设置，未完成
Route::get('/users/edit_link', 'UserController@editLink')->name('users.edit_link');

//用户修改密码-----------------------(基本完成)
Route::get('/users/edit_password', 'UserController@editPwd')->name('users.edit_pwd');

Route::get('/users/edit', 'UserController@edit')->name('users.edit');
//showVote 获取的列表不对，，暂时显示效果
//users.topic  未完成
//users.comment 未完成
Route::get('/users/{id}/vote', 'UserController@showVote')->name('users.vote');
Route::get('/users/{id}/topic', 'UserController@showTopic')->name('users.topic');
Route::get('/users/{id}/comment', 'UserController@showComment')->name('users.comment');

//users.edit. 前端部分验证可行，后台处理------------------(基本完成)。
//users.show  //基本信息填充好了， 但右侧显示，尚未完成
//users.update  -----edit相关。
//×××××××××   尚且欠缺一个图像处理的功能模块 ×××××××××

Route::resource('users', 'UserController', ['only'=>['show','update']]);


/*---------------------------------------------*/

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*\App\Models\User::create([
            'name' => "Ten_year.",
            'email' => "553974235@qq.com",
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);*/

        \App\Models\Theme::create([
            'name'=>'叽喳校园',
            'cover'=>'/uploads/images/theme_school.jpg',
            'intro'=>'大学生活太无聊，上叽喳校园来吐槽，大学生活太孤单，上叽喳校园找朋友，总能让你发现不一样的大学生活'
        ]);
        \App\Models\Theme::create([
            'name'=>'信息广场',
            'cover'=>'/uploads/images/theme_info.jpg',
            'intro'=>'欢迎来到信息广场，这里有你需要的信息'
        ]);

        \App\Models\Theme::create([
            'name'=>'游戏天地',
            'cover'=>'/uploads/images/theme_game.jpg',
            'intro'=>'时常玩游戏，你的技术到底是如何的叼？一起来分享一下有趣的游戏和你高超的技术吧'
        ]);

        \App\Models\Theme::create([
            'name'=>'动漫世界',
            'cover'=>'/uploads/images/theme_comic.jpg',
            'intro'=>'游戏,动漫人物爱好者集聚地。可以讨论游戏和动漫作品人物相关的话题。这里公平自由欢迎大家。来这里的都是朋友大家要和平相处'
        ]);

        \App\Models\Theme::create([
            'name'=>'体育天地',
            'cover'=>'/uploads/images/theme_sports.jpg',
            'intro'=>'体育迷的聚集地,欢迎同学常驻这里,来这儿结识和你志同道合的朋友吧!'
        ]);

        \App\Models\Theme::create([
            'name'=>'科技时代',
            'cover'=>'/uploads/images/theme_science.jpg',
            'intro'=>'科技时代主题是一个创新资讯的聚集地，希望大家多整理些 ,科技前沿的,创新的话题,大家一起分享~~'
        ]);
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
        "is_active"=>"yes"
    ];
});


$factory->define(App\Models\Theme::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->password(4,9),
        'intro' => str_limit($faker->paragraph(),200),
        'topics_count'=>rand(0,100),
        'focus_count'=>rand(0,100),
        'color'=>'#5C93B0'
    ];
});

$factory->define(App\Models\Topic::class, function (Faker\Generator $faker) {
    return [
        'title' => str_limit($faker->paragraph(),90),
        'content' => $faker->text(2000),
        "resolved_content"=> $faker->text(2000),
        'summary'=>$faker->text(200),
        'vote_count'=>rand(0,500),
        'reply_count'=>rand(0,500),
        'collect_count'=>rand(0,500),
        'browse_count'=>rand(0,500),
        'type'=>$faker->randomElement(['original','reprint','question']),
        'user_id'=>1,
        'created_at'=>Carbon\Carbon::now()->subDays(random_int(1,4)),
        'theme_id'=>random_int(0,10),
        'figure'=>"http://localhost:8000/uploads/images/64933618057246c38e1e1b.jpg",
    ];
});
$factory->define(App\Models\Activity::class, function (Faker\Generator $faker) {
    return [
        'title' => str_limit($faker->paragraph(),90),
        'content' => $faker->text(2000),
        "resolved_content"=> $faker->text(2000),
        'intro'=>$faker->text(200),
        'place'=>$faker->text(10),
        'created_at'=>Carbon\Carbon::now()->subDays(random_int(1,4)),
        'user_id'=>1,
        'date'=>Carbon\Carbon::now()->addDay(random_int(1,10)),
    ];
});
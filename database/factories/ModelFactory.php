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
        'type'=>$faker->randomElement(['original','reprint','question','video']),
        'user_id'=>1,
        'created_at'=>Carbon\Carbon::now()->subDays(random_int(1,30)),
        'theme_id'=>random_int(0,10),
        'figure'=>"http://localhost:8000/uploads/2017-01-22-22-04-22_5884bbe6ed1dc.png",
    ];
});
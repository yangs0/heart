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
        \App\Models\User::create([
            'name' => "Ten_year.",
            'email' => "553974235@qq.com",
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
    }
}

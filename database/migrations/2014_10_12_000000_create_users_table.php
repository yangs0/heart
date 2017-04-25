<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->string('avatar')->default('/uploads/avatars/default.jpg');

            $table->integer('reply_count')->default(0);
            $table->integer('follower_count')->default(0);
            $table->integer('topics_count')->default(0);

            $table->string('city')->default('');
            $table->string('school')->default('');
            //$table->string('title')->default('');  称号暂时跳过
            $table->string('intro')->default('');
            $table->enum('sex', ['boy',  'girl'])->default('boy');
            $table->enum('is_banned', ['yes','no'])->default('no')->index();
            $table->enum('is_active', ['yes','no'])->default('no')->index();
            $table->enum('is_admin', ['yes','no'])->default('no')->index();
            $table->string('verification_token')->nullable();


            $table->string('github_name')->default('');
            $table->string('github_link')->default('');
            $table->string('weibo_name')->default('');
            $table->string('weibo_link')->default('');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

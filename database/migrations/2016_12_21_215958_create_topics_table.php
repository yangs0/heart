<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->text('content');
            $table->text('resolved_content');
            $table->string('summary')->nullable();

            //$table->integer('collect_num')->default(0); // 收藏功能暂且不做
            $table->integer('vote_count')->unsigned()->default(0);
            $table->integer('reply_count')->unsigned()->default(0);
            $table->integer('collect_count')->unsigned()->default(0);
            $table->integer('browse_count')->unsigned()->default(0);

            $table->enum('type', ['original', 'reprint','question','video'])->default('original');
            $table->string('source')->nullable();
            $table->string('sourceUrl')->nullable();

            /* $table->boolean('validation')->default(false);*/
            $table->string('figure')->nullable()->default('/img/default.jpg');

            $table->enum('is_excellent', ['yes', 'no'])->default('no');
            $table->enum('is_banned', ['yes', 'no'])->default('no')->index();

            $table->integer('user_id')->unsigned()->index();
            $table->integer('theme_id')->unsigned()->index();
            $table->integer('last_reply_user_id')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('topics');
    }
}

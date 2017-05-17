<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('活动标题');
            $table->text('content')->comment('活动内容');
            $table->text('resolved_content')->comment('MD处理的活动内容');
            $table->string('intro')->comment('活动简单介绍');
            $table->string('start')->comment('起始时间');
            $table->string('end')->comment('截止时间');
            $table->string('place')->comment('活动地点');
            $table->string('cover')->nullable()->comment('封面');
            $table->enum('is_banned',['yes','no'])->default('no')->comment('禁止');
            $table->unsignedInteger('reply_count')->default(0)->comment("评论数");
            $table->unsignedInteger('part_count')->default(0)->comment("参与人数");
            $table->unsignedInteger('last_reply_user_id')->nullable()->index();
            $table->unsignedInteger('user_id')->index();
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
        Schema::dropIfExists('activities');
    }
}

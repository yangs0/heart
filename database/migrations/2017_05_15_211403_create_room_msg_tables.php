<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomMsgTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_msg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('theme_id')->unsigned()->index();
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
        Schema::dropIfExists('room_msg');
    }
}

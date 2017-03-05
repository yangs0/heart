<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10)->unique();
            $table->integer('topics_count')->unsigned()->default(0);
            $table->integer('focus_count')->unsigned()->default(0);
            $table->string('cover')->default('/images/default.jpg');
            $table->string('color')->default('#5C93B0');
            $table->string('intro');

            $table->enum('is_banned', ['yes', 'no'])->default('no')->index();
           // $table->integer('user_id')->commit("创建者，后期可完成专属话题");
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
        Schema::dropIfExists('themes');
    }
}

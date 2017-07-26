<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('movie_id');
            $table->string('movie_name',20)->default('');//名字
            $table->string('image',50)->default('');//图片地址
            $table->string('director',20)->default('');//导演
            $table->integer('time')->default(0);//年代
            $table->tinyinteger('country')->default(0);//地区
            $table->string('another_name',20)->default('');//别名
            $table->string('intro',200)->default('');//介绍
            $table->tinyinteger('is_show')->default(1);//是否显示
            $table->tinyinteger('is_hot')->default(0);//是否精品
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
        Schema::drop('movies');
    }
}

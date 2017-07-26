<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToRelation2sMovieid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relation2s', function (Blueprint $table) {
            $table->integer('movie_id')->after('relation2_id');//电影id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relation2s', function (Blueprint $table) {
            $table->dropColumn('movie_id');
        });
    }
}

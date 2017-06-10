<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('time')->nullable();
            $table->integer('score')->nullable();
            $table->boolean('isFinished')->default('0');
            $table->string('board'); // 0 = ball 1 = gap
            $table->timestamps();
        });

//        Schema::table('games', function (Blueprint $table){
//            $table->foreign('user_id')->references('id')
//                ->on('users')->onDelete('cascade')
//                ->onUpdate('cascade');
//        });

        Schema::table('games', function (Blueprint $table){
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('points');
            $table->timestamps();
        });

        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('description');
            $table->integer('value');
            $table->integer('given_by')->default(1)->unsigned();
            $table->timestamps();

            //Foreign Keys
            $table->foreign('given_by')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
        Schema::dropIfExists('ranks');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('photo')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('portions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->double('price');
            $table->integer('food_id')->unsigned();
            $table->string('currency')->nullable();
            $table->timestamps();
            //Foreign Keys
            $table->foreign('food_id')->references('id')->on('food');
        });

        Schema::create('food_favourite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            //Foreign Keys
            $table->foreign('food_id')->references('id')->on('food');
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
        Schema::dropIfExists('favourite_food');
        Schema::dropIfExists('portions');
        Schema::dropIfExists('food');
    }
}

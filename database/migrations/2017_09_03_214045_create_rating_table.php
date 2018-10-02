<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('rated_by')->unsigned();
            $table->integer('communication')->nullable();
            $table->integer('cleanliness')->nullable();
            $table->integer('delivery')->nullable();
            $table->timestamps();

            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('rated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}

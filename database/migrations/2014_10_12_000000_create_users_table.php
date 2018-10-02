<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_id')->unique()->nullable();
            $table->string('firstname');
            $table->string('surname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobilephone')->nullable();
            $table->string('businessphone')->nullable();
            $table->string('avatar')->default('avatar.jpg')->nullable();
            $table->string('youtube')->nullable();
            $table->text('about')->nullable();
            $table->text('specialities')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->boolean('profile_set')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('followers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('follower_id')->unsigned();
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
        Schema::dropIfExists('followers');
        Schema::dropIfExists('users');
    }
}

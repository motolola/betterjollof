<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->boolean('published')->default(0);
            $table->timestamps();
            //Foreign key ...
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('blog_id')->unsigned();
            $table->integer('parent_id')->default(0)->unsigned();
            $table->text('text');
            $table->timestamps();
            //Foreign key ...
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('blog_id')->references('id')->on('blogs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comments');
        Schema::dropIfExists('blogs');
    }
}

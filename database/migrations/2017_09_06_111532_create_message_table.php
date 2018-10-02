<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to_id')->unsigned();
            $table->integer('from_id')->unsigned();
            $table->string('subject');
            $table->text('body');
            $table->boolean('to_read')->default(0);
            $table->boolean('to_deleted')->default(0);
            $table->boolean('from_deleted')->default(0);
            $table->timestamps();
            //Foreign key ...
            $table->foreign('to_id')->references('id')->on('users');
            $table->foreign('from_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

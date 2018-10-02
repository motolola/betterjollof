<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();

            //Foreign Keys
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('basket_portion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('portion_id')->unsigned();
            $table->integer('basket_id')->unsigned();
            $table->integer('unit');
            $table->timestamps();
            //Foreign Keys
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->foreign('portion_id')->references('id')->on('portions');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('basket_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->string('status')->default('Open');
            $table->text('message');
            $table->timestamps();
            //Foreign Keys
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vendor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('basket_portion');
        Schema::dropIfExists('baskets');
    }
}

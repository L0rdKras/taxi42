<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MovementPay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement_pay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movement_id')->unsigned();
            $table->integer('pay_id')->unsigned();
            $table->timestamps();

            $table->foreign('movement_id')->references('id')->on('movements');
            $table->foreign('pay_id')->references('id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movement_pay');
    }
}

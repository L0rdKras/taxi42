<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vouchers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movil_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->integer('total');
            $table->date('vousher_date');
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('movil_id')->references('id')->on('movils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vouchers');
    }
}

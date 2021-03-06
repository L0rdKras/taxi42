<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Accounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('amount');
            $table->string('type');
            $table->integer('exigible')->unsigned();
            $table->integer('renovate')->unsigned();
            $table->date('init_date');
            $table->date('finish_date');
            $table->integer('fondo_id')->unsigned();
            $table->timestamps();

            $table->foreign('fondo_id')->references('id')->on('fondos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}

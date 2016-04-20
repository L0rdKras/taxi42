<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pendings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('amount');
            $table->string('status');
            $table->integer('movil_id')->unsigned();
            $table->integer('account_id')->unsigned();
            //$table->integer('pay_id')->unsigned();
            $table->timestamps();

            $table->foreign('movil_id')->references('id')->on('movils');
            $table->foreign('account_id')->references('id')->on('accounts');
            //$table->foreign('pay_id')->references('id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pendings');
    }
}

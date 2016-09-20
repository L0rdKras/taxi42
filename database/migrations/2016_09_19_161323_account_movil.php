<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccountMovil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('account_movil', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('movil_id')->unsigned();
          $table->integer('account_id')->unsigned();
          $table->timestamps();

          $table->foreign('movil_id')->references('id')->on('movils');
          $table->foreign('account_id')->references('id')->on('accounts');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

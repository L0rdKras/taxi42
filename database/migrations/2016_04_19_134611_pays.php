<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('total');
            $table->integer('sheets');
            $table->integer('sheets_value');
            $table->integer('movil_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('pays');
    }
}

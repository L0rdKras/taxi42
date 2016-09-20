<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->string('plate')->unique();
            $table->string('mark');
            $table->string('model');
            $table->integer('person_id')->unsigned();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movils');
    }
}

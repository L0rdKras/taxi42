<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VoucherDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucherDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount_charged')->unsigned();
            $table->integer('voucher_id')->unsigned();
            $table->integer('account_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('voucherDetails');
    }
}

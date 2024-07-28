<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tanggal')->nullable();
            $table->string('qty')->nullable();
            $table->string('total_harga')->nullable();
            $table->string('total_bayar')->nullable();
            $table->string('promo')->nullable();
            $table->string('diskon')->nullable();
            $table->string('kustomer')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
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

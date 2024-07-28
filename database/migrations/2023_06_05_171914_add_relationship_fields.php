<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8582907')->references('id')->on('users');
        });

        Schema::table('produks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8583206')->references('id')->on('users');
        });

        Schema::table('transaksis', function (Blueprint $table) {
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->foreign('produk_id', 'produk_fk_8584636')->references('id')->on('produks');
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

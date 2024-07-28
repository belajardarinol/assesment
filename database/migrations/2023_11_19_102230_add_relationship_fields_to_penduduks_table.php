<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduks', function (Blueprint $table) {
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id', 'provinsi_fk_9225234')->references('id')->on('provinsis');
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->foreign('kabupaten_id', 'kabupaten_fk_9225235')->references('id')->on('kabupatens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduks', function (Blueprint $table) {
            //
        });
    }
}

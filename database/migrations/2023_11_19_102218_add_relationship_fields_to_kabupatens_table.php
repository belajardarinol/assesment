<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kabupatens', function (Blueprint $table) {
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id', 'provinsi_fk_9225233')->references('id')->on('provinsis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kabupatens', function (Blueprint $table) {
            //
        });
    }
}

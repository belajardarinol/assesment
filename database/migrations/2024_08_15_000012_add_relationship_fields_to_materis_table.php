<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaterisTable extends Migration
{
    public function up()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_bab_id')->nullable();
            $table->foreign('sub_bab_id', 'sub_bab_fk_10028527')->references('id')->on('sub_babs');
        });
    }
}

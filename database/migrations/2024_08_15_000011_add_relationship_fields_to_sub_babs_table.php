<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubBabsTable extends Migration
{
    public function up()
    {
        Schema::table('sub_babs', function (Blueprint $table) {
            $table->unsignedBigInteger('bab_id')->nullable();
            $table->foreign('bab_id', 'bab_fk_10028521')->references('id')->on('babs');
        });
    }
}

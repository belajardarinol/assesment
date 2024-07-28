<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpmkSubCpmkPivotTable extends Migration
{
    public function up()
    {
        Schema::create('cpmk_sub_cpmk', function (Blueprint $table) {
            $table->unsignedBigInteger('cpmk_id');
            $table->foreign('cpmk_id', 'cpmk_id_fk_9976660')->references('id')->on('cpmks')->onDelete('cascade');
            $table->unsignedBigInteger('sub_cpmk_id');
            $table->foreign('sub_cpmk_id', 'sub_cpmk_id_fk_9976660')->references('id')->on('sub_cpmks')->onDelete('cascade');
        });
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keterampilan_apoteker')->nullable();
            $table->string('kode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

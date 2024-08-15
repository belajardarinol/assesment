<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasisTable extends Migration
{
    public function up()
    {
        Schema::create('klasifikasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_klasifikasi')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('kode_subkategori')->nullable();
            $table->string('subkategori')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

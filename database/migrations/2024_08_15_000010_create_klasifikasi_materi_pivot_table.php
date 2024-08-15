<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasifikasiMateriPivotTable extends Migration
{
    public function up()
    {
        Schema::create('klasifikasi_materi', function (Blueprint $table) {
            $table->unsignedBigInteger('materi_id');
            $table->foreign('materi_id', 'materi_id_fk_10028530')->references('id')->on('materis')->onDelete('cascade');
            $table->unsignedBigInteger('klasifikasi_id');
            $table->foreign('klasifikasi_id', 'klasifikasi_id_fk_10028530')->references('id')->on('klasifikasis')->onDelete('cascade');
        });
    }
}

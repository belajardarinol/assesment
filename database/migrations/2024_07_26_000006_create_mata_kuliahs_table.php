<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('sks')->nullable();
            $table->integer('jumlah_pertemuan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
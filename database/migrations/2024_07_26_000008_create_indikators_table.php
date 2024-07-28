<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorsTable extends Migration
{
    public function up()
    {
        Schema::create('indikators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabsTable extends Migration
{
    public function up()
    {
        Schema::create('babs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_bab')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

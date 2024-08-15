<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubBabsTable extends Migration
{
    public function up()
    {
        Schema::create('sub_babs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_sub_bab')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

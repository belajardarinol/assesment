<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id', 'user_id_fk_16181618')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('user_id', 'user_id_fk_16181618')->references('id')->on('users')->onDelete('set null');


            // $table->unsignedBigInteger('materi_id')->nullable();
            // $table->foreign('materi_id', 'materi_id_fk_16181618')->references('id')->on('materis')->onDelete('set null');
            $table->unsignedBigInteger('materi_id')->nullable();
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('set null');
            $table->engine = 'InnoDB';
            $table->integer('value')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

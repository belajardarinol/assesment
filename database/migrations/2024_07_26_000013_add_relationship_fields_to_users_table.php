<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id', 'kelas_fk_9976644')->references('id')->on('kelas');
        });
    }
}
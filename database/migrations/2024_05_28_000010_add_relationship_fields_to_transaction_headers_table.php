<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionHeadersTable extends Migration
{
    public function up()
    {
        Schema::table('transaction_headers', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_9824469')->references('id')->on('ms_categories');
        });
    }
}
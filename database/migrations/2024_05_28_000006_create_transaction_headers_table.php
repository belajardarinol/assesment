<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('code')->nullable();
            $table->float('rate_euro', 15, 2)->nullable();
            $table->date('date_paid');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
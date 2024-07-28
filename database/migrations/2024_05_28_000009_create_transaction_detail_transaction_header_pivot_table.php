<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailTransactionHeaderPivotTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_detail_transaction_header', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_detail_id');
            $table->foreign('transaction_detail_id', 'transaction_detail_id_fk_9803894')->references('id')->on('transaction_details')->onDelete('cascade');
            $table->unsignedBigInteger('transaction_header_id');
            $table->foreign('transaction_header_id', 'transaction_header_id_fk_9803894')->references('id')->on('transaction_headers')->onDelete('cascade');
        });
    }
}
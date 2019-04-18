<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('amount')->nullable();
            $table->string('trans_id')->nullable();
            $table->string('state')->nullable();
            $table->string('invoice_number')->nullable();
            $table->unsignedInteger('vallet_id');
            $table->foreign('vallet_id')->references('id')->on('vallets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans_logs');
    }
}

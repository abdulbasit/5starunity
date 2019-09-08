<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupponCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuppon_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cuppon_id');
            $table->foreign('cuppon_id')->references('id')->on('discount_cuppons');
            $table->integer('counter');
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
        Schema::dropIfExists('cuppon_counts');
    }
}

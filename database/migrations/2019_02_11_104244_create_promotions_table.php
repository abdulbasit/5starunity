<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            // $table->integer('lot_id');
            $table->unsignedInteger('lot_id');
            $table->foreign('lot_id')->references('id')->on('lotteries');
            $table->dateTime('start_at');
            $table->dateTime('ends_at');
            $table->float('min_lot_amount')->nullable();
            $table->integer('max_lots')->nullable();
            $table->string('reward')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('promotions');
    }
}

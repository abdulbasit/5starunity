<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryContestentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_contestents', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('lottery_id');
            $table->unsignedInteger('lottery_id');
            $table->foreign('lottery_id')->references('id')->on('lotteries');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('lot_number')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('lottery_contestents');
    }
}

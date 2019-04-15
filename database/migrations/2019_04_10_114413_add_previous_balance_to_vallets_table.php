<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreviousBalanceToValletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vallets', function (Blueprint $table) {
            $table->integer('pre_balance');
            $table->integer('total_available_balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vallets', function (Blueprint $table) {
            $table->removeColumn('pre_balance');
            $table->removeColumn('total_available_balance');
        });
    }
}

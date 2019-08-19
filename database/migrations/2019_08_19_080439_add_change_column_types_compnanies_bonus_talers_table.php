<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChangeColumnTypesCompnaniesBonusTalersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->float('views_amount')->change();
            $table->float('user_amount')->change();
        });
        Schema::table('bonus_talers', function (Blueprint $table) {
            $table->float('credit')->change();
            $table->float('pre_balance')->change();
            $table->float('total_available_balance')->change();
            $table->float('balance')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            Schema::table('companies', function (Blueprint $table) {
                $table->int('views_amount')->change();
                $table->int('user_amount')->change();
            });
            Schema::table('bonus_talers', function (Blueprint $table) {
                $table->string('credit')->change();
                $table->string('pre_balance')->change();
                $table->string('total_available_balance')->change();
                $table->string('balance')->change();
            });
        });
    }
}

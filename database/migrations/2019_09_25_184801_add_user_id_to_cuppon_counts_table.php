<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToCupponCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cuppon_counts', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('ip_address')->nullable();
        });
    }
    public function down()
    {
        Schema::table('cuppon_counts', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('ip_address');
        });
    }
}

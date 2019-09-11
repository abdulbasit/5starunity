<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCupponCodeToDiscountCupponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount_cuppons', function (Blueprint $table) {
            $table->string('cuppon_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_cuppons', function (Blueprint $table) {
            $table->dropColumn('cuppon_code');
        });
    }
}

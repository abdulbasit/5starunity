<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCateIdToPromotionPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotion_partners', function (Blueprint $table) {
            $table->integer('category_id')->nullable();
            $table->integer('discount_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promotion_partners', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('discount_amount');
        });
    }
}

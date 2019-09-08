<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountCupponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_cuppons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable()->comment('can be % or static');
            $table->double('price')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('reference_website')->nullable();
            $table->integer('usage')->nullable()->comment("Limitize the usage ");
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
        Schema::dropIfExists('discount_cuppons');
    }
}

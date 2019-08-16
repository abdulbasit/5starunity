<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();
            $table->string('company_views')->nullable();
            $table->string('company_views_attempt')->nullable();
            $table->string('duration')->nullable();
            $table->string('vidoe')->nullable();
            $table->string('image')->nullable();
            $table->integer('view_counter')->nullable();
            $table->integer('views_amount')->nullable();
            $table->integer('user_amount')->nullable();
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
        Schema::dropIfExists('companies');
    }
}

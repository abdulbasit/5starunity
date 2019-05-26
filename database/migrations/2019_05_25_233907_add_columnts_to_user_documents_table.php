<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumntsToUserDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_documents', function (Blueprint $table) {
           $table->string('id_front')->nullable();
           $table->string('id_back')->nullable();
           $table->string('address_2')->nullable();
        });
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('address_2')->nullable();
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_documents', function (Blueprint $table) {
           $table->dropColumn('id_front');
           $table->dropColumn('id_back');
        });
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn('address_2');
         });
    }
}

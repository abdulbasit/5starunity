<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecverIdToInvitationsListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitations_list', function (Blueprint $table) {
             $table->integer('reciver_id')->nullable()->unsigned();
             $table->foreign('reciver_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitations_list', function (Blueprint $table) {
            $table->dropCloumn('reciver_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
class CreateNewAdminUserUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $password= bcrypt('pL4!=F&8');
            DB::table('admins')->insert(
                array(
                    'id'=>2,
                    'email' => 'marras@5starunity.com',
                    'password'=>$password,
                    'fname'=>'Dirk',
                    'lname' => "Marras",
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                )
            );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

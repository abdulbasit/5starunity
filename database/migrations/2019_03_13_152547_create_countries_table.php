<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('migrations')->insert(
            array(
                'migration' => '2019_03_13_152547_create_countries_table',
                'batch'=>"1"
            )
        );
        ini_set('memory_limit', '-1');
        DB::unprepared(file_get_contents('countries.sql'));
        DB::unprepared(file_get_contents('states.sql'));
        DB::unprepared(file_get_contents('cities.sql'));


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('states');
        Schema::dropIfExists('cities');
    }
}

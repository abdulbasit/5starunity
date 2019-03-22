<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProClassificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class')->nullable();
            $table->float('min_price')->nullable();
            $table->float('max_price')->nullable();
            $table->float('factor')->nullable();
            $table->integer('per_lot_amount')->nullable();
            $table->float('coins_per_lot')->nullable();
            $table->timestamps();
        });
        DB::table('pro_classifications')->insert(
            array(
                'id'=>1,
                'class' => '1',
                'min_price'=>"200",
                'max_price'=>'1499',
                'factor' => "2.5",
                'per_lot_amount' =>"1",
                'coins_per_lot' => '1'
            )
        );
        DB::table('pro_classifications')->insert(
            array(
                'id'=>2,
                'class' => '2',
                'min_price'=>"1500",
                'max_price'=>'3999',
                'factor' => "2.5",
                'per_lot_amount' =>"1",
                'coins_per_lot' => '2'
            )
        );
        DB::table('pro_classifications')->insert(
            array(
                'id'=>3,
                'class' => '3',
                'min_price'=>"4000",
                'max_price'=>'7999',
                'factor' => "2.5",
                'per_lot_amount' =>"1",
                'coins_per_lot' => '4'
            )
        );
        DB::table('pro_classifications')->insert(
            array(
                'id'=>4,
                'class' => '4',
                'min_price'=>"8000",
                'max_price'=>'15999',
                'factor' => "2.5",
                'per_lot_amount' =>"1",
                'coins_per_lot' => '8'
            )
        );
        DB::table('pro_classifications')->insert(
            array(
                'id'=>5,
                'class' => '5',
                'min_price'=>"16000",
                'max_price'=>'0',
                'factor' => "2.5",
                'per_lot_amount' =>"1",
                'coins_per_lot' => '12'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_classifications');
    }
}

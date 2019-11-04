<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Admin;
class CreatePromotionPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            // $table->string('description')->nullable()->comment("Description for page top");
            $table->string('type')->nullable()->comment('can be % or static');
            $table->double('price')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('reference_website')->nullable();
            $table->text('short_description')->nullable()->comment("for listing ");
            // $table->text('description_bottom')->nullable()->comment("For page bottom ");
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
        Schema::dropIfExists('promotion_partners');
    }
}

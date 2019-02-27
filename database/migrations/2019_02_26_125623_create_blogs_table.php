<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_meta')->nullable();
            $table->string('seo_meta_des')->nullable();
            $table->integer('cat_id')->nullable();
            $table->string('post_img')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->integer('post_views')->nullable();
            $table->boolean('allow_cooments')->nullable()->default(0);
            $table->integer('comment_count')->nullable();
            $table->integer('post_author')->nullable();
            $table->string('post_name')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}

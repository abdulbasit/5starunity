<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlogIdBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->unsignedInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            Schema::enableForeignKeyConstraints();
            $table->dropForeign('blog_comments_blog_id_foreign');
            $table->dropForeign('blog_comments_user_id_foreign');
        });

    }
}

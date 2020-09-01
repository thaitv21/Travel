<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->nullable()->change();
            $table->integer('post_id')->unsigned()->change();
            $table->integer('user_id')->unsigned()->change();

            $table->foreign('parent_id')->references('id')->on('comments')
                ->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('comments', function (Blueprint $table) {
            $table->integer('parent_id')->unsigned()->change();
            $table->integer('post_id')->unsigned()->change();
            $table->integer('user_id')->unsigned()->change();
        });
    }
}

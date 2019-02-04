<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permalink');
            $table->string('title');
            $table->text('body');
            $table->unsignedInteger('createdBy_user_id');
            $table->unsignedInteger('updatedBy_user_id')->nullable();
            $table->unsignedTinyInteger('type')->default(0);
            $table->boolean('published')->default(false);
            $table->boolean('visible')->default(true);
            $table->timestamp('publishDate')->nullable();
            $table->string('coverImg')->nullable();
            $table->char('backgroundColor',6)->nullable();
            $table->timestamps();

            $table->foreign('createdBy_user_id')->references('id')->on('users');
            $table->foreign('updatedBy_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

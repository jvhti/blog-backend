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
            $table->text('text');
            $table->unsignedInteger('createdBy');
            $table->unsignedInteger('updatedBy')->nullable();
            $table->unsignedTinyInteger('type');
            $table->boolean('published');
            $table->boolean('visible');
            $table->timestamp('publishDate');
            $table->string('coverImg');
            $table->char('backgroundColor',6);
            $table->timestamps();

            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('updatedBy')->references('id')->on('users');
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

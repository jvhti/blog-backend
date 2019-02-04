<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->unsignedInteger('createdBy')->nullable();
            $table->unsignedInteger('editedBy')->nullable();
            $table->boolean('visible');
            $table->unsignedInteger('parentComment')->nullable();
            $table->unsignedInteger('postID')->nullable();
            $table->ipAddress('ipAddress');
            $table->boolean('removed');
            $table->string('removedCause')->nullable();
            $table->timestamps();

            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('editedBy')->references('id')->on('users');
            $table->foreign('parentComment')->references('id')->on('comments');
            $table->foreign('postID')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

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
            $table->unsignedInteger('createdBy_user_id')->nullable();
            $table->unsignedInteger('editedBy_user_id')->nullable();
            $table->boolean('visible');
            $table->unsignedInteger('parentComment_id')->nullable();
            $table->unsignedInteger('post_id');
            $table->ipAddress('ipAddress');
            $table->boolean('removed');
            $table->string('removedCause')->nullable();
            $table->timestamps();

            $table->foreign('createdBy_user_id')->references('id')->on('users');
            $table->foreign('editedBy_user_id')->references('id')->on('users');
            $table->foreign('parentComment_id')->references('id')->on('comments');
            $table->foreign('post_id')->references('id')->on('posts');
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

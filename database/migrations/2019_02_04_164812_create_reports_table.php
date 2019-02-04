<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->ipAddress('ipAddress');
            $table->double('trustFactor');
            $table->unsignedInteger('createdBy')->nullable();
            $table->unsignedInteger('reviewedBy')->nullable();
            $table->unsignedInteger('reportCommentID')->nullable();
            $table->unsignedInteger('reportPostID')->nullable();
            $table->unsignedInteger('reportUserID')->nullable();
            $table->boolean('confirmed');
            $table->text('reviewerResponse');
            $table->string('reviewerAction');
            $table->string('type');

            $table->foreign('createdBy')->references('id')->on('users');
            $table->foreign('reviewedBy')->references('id')->on('users');
            $table->foreign('reportUserID')->references('id')->on('users');
            $table->foreign('reportCommentID')->references('id')->on('comments');
            $table->foreign('reportPostID')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}

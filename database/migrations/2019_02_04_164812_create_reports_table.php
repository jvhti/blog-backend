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
            $table->double('trustFactor')->default(0);
            $table->unsignedInteger('createdBy')->nullable();
            $table->unsignedInteger('reviewedBy')->nullable();
            $table->unsignedInteger('reportCommentID')->nullable();
            $table->unsignedInteger('reportPostID')->nullable();
            $table->unsignedInteger('reportUserID')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->text('reviewerResponse')->nullable();
            $table->string('reviewerAction')->nullable();
            $table->string('type')->default('other');

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

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
            $table->unsignedInteger('createdBy_user_id')->nullable();
            $table->unsignedInteger('reviewedBy_user_id')->nullable();
            $table->unsignedInteger('reportedComment_id')->nullable();
            $table->unsignedInteger('reportedPost_id')->nullable();
            $table->unsignedInteger('reportedUser_id')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->text('reviewerResponse')->nullable();
            $table->string('reviewerAction')->nullable();
            $table->string('type')->default('other');

            $table->foreign('createdBy_user_id')->references('id')->on('users');
            $table->foreign('reviewedBy_user_id')->references('id')->on('users');
            $table->foreign('reportedUser_id')->references('id')->on('users');
            $table->foreign('reportedComment_id')->references('id')->on('comments');
            $table->foreign('reportedPost_id')->references('id')->on('posts');
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

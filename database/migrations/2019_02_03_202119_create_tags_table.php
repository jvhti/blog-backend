<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permalink');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('createdBy_user_id');
            $table->boolean('visible');
            $table->string('coverImg')->nullable();
            $table->char('backgroundColor', 6)->nullable();
            $table->timestamps();

            $table->foreign('createdBy_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}

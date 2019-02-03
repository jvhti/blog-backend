<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passwordResets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->boolean('used');
            $table->timestamp('usedAt');
            $table->string('createdByIP');
            $table->string('usedByIP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passwordResets');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_line_invite_people', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->integer('user_id')->nullable();
            $table->unsignedBigInteger('time_line_id');
            $table->foreign('time_line_id')->references('id')->on('time_lines');
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
        Schema::dropIfExists('time_line_invite_people');
    }
};

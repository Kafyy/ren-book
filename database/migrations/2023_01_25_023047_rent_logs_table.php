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
        Schema::create('rent_logs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('users_id');
        $table->foreign('users_id')->references('id')->on('users');
        $table->unsignedBigInteger('book_id');
        $table->foreign('book_id')->references('id')->on('books');
        $table->date('ren_date');
        $table->date('return_date');
        $table->date('actual_return_date')->nullable();
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
        Schema::dropIfExists('rent_logs');
    }
};

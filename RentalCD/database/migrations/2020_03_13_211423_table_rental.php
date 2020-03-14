<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRental extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('role');
        });

        Schema::create('rental_cd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('rate');
            $table->string('category');
            $table->integer('quantity');
        });

        Schema::create('rent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('title');
            $table->dateTime('date_rent');
            $table->dateTime('date_return')->nullable();
            $table->integer('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentalcd');
    }
}

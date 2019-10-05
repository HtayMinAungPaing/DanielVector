<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookeds', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('booking_id')->nullable();
            $table->foreign("booking_id")->references("id")->on("bookings")->onDelete("Cascade");

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("Cascade");

            $table->unsignedInteger('doctor_id')->nullable();
            $table->foreign("doctor_id")->references("id")->on("users")->onDelete("Cascade");

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
        Schema::dropIfExists('bookeds');
    }
}

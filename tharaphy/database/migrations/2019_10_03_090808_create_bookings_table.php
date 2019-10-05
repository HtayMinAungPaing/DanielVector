<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('doctorname');

            $table->string('time');

            $table->string('date');

            $table->string('booked');

            $table->unsignedInteger('hospital_id')->nullable();
            $table->foreign("hospital_id")->references("id")->on("hospitals")->onDelete("Cascade");

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
        Schema::dropIfExists('bookings');
    }
}

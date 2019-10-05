<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cardno');
            $table->bigInteger('balance');   
            $table->string('cvv');
            $table->string('expdate');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("Cascade");
            
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
        Schema::dropIfExists('banks');
    }
}

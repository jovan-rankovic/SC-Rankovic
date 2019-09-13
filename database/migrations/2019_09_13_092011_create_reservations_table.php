<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('user_id')->unsigned();
            $table->integer('training_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('training_id')
                ->references('id')
                ->on('trainings')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

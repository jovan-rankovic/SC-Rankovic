<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrivalsTable extends Migration
{
    public function up()
    {
        Schema::create('arrivals', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('user_id')->unsigned();
            $table->integer('training_id')->unsigned();
            $table->integer('trainer_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('training_id')
                ->references('id')
                ->on('trainings')
                ->onDelete('cascade');
            $table->foreign('trainer_id')
                ->references('id')
                ->on('trainers');
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('arrivals');
    }
}

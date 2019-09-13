<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->unique();
            $table->smallInteger('duration');
            $table->tinyInteger('capacity');
            $table->string('intensity', 30);
            $table->text('target');
            $table->text('benefits');
            $table->text('description');
            $table->string('logo',255);
            $table->string('image', 255);
            $table->boolean('reservations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}

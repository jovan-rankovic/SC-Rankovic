<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}

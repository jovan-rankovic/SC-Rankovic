<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('price_id')->unsigned();
            $table->timestamps();

            $table->foreign('price_id')
                ->references('id')
                ->on('prices');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}

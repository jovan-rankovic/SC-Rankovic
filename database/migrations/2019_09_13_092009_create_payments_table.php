<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('payment_date');
            $table->date('valid_thru');
            $table->integer('price_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('operator_id')->unsigned();
            $table->timestamps();

            $table->foreign('price_id')
                ->references('id')
                ->on('prices')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

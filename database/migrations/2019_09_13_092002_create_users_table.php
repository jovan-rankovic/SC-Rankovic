<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_number',5)->unique()->nullable();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 60)->unique();
            $table->string('phone', 10);
            $table->string('address', 100);
            $table->date('birth_date');
            $table->string('image',255)->default('images/user/new.jpg');
            $table->string('password', 32);
            $table->integer('role_id')->unsigned();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

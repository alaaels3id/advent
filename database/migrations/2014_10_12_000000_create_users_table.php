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
            $table->string('firstName', 20);
            $table->string('lastName', 20);
            $table->string('username', 8);
            $table->string('mobile', 11);
            $table->string('image');
            $table->date('dob');
            $table->string('location');
            $table->string('jop');
            $table->boolean('role', 2)->default(0);
            $table->string('about', 160)->default('none');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

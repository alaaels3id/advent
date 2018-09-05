<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 200);
            $table->string('subtitle', 200);
            $table->string('image', 300);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}

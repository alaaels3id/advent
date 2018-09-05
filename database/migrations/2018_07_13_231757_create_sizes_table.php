<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('size', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}

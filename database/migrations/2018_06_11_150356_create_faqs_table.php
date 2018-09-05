<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('head', 500)->default(null);
            $table->string('body', 500)->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}

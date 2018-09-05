<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorToColors extends Migration
{
    public function up()
    {
        Schema::table('colors', function (Blueprint $table) {
            $table->string('color');
        });
    }

    public function down()
    {
        Schema::table('colors', function (Blueprint $table) {
            $table->string('color');
        });
    }
}

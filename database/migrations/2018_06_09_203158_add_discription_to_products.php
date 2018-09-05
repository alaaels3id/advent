<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscriptionToProducts extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('discription', 500);
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('discription', 500);

        });
    }
}

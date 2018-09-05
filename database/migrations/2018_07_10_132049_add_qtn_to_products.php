<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQtnToProducts extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('qtn');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('qtn');
        });
    }
}

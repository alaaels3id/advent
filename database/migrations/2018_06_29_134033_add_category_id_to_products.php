<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToProducts extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('category_id');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('category_id');
        });
    }
}

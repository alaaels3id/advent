<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryToBanners extends Migration
{
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('category', 100);
        });
    }

    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('category', 100);
        });
    }
}

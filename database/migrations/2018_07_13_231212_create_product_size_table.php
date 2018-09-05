<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizeTable extends Migration
{
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('size_id');
            $table->primary(['product_id', 'size_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_size');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('name', 50);
            $table->float('price');
            $table->string('image');
            $table->string('model', 50);
            $table->integer('type');
            $table->integer('category');
            $table->string('color', 50);
            $table->string('size', 50);
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

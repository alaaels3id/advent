<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminProductTable extends Migration
{
    public function up()
    {
        Schema::create('admin_product', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('admin_id');
            $table->primary(['product_id', 'admin_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_product');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToFaqs extends Migration
{
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('type', 100);
        });
    }

    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('type', 100);
        });
    }
}

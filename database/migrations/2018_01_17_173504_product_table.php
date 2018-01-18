<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTable extends Migration
{

    public function up()
    {
      Schema::create('product', function (Blueprint $table) {
          $table->increments('id_product')->unique();
          $table->text('title');
          $table->text('description');
          $table->string('image');
          $table->integer('stock');
      });
    }

    public function down()
    {
        Schema::dropIfExists('product');
    }
}

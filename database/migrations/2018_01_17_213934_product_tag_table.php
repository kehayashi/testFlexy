<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTagTable extends Migration
{

    public function up()
    {
      Schema::create('product_tag', function (Blueprint $table) {
          $table->integer('id_product');
          $table->integer('id_tag');
      });
    }


    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
}

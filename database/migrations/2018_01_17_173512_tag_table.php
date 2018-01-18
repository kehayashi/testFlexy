<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagTable extends Migration
{

    public function up()
    {
      Schema::create('tag', function (Blueprint $table) {
             $table->increments('id_tag')->unique();
             $table->string('name');
         });
    }

    public function down()
    {
        Schema::dropIfExists('tag');
    }
}

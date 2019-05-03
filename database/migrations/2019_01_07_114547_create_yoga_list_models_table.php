<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYogaListModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {
        Schema::create('yoga_list_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disease');
            $table->string('exersise');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yoga_list_models');
    }
}

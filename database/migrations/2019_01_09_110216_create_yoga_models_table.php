<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYogaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoga_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('referredBy')->nullable();
            $table->string('age')->nullable();
            $table->text('investigationAdvised')->nullable();
            $table->string('yogadate')->nullable();
            $table->string('disease');
            $table->string('exersise');
            $table->string('other')->nullable();
            $table->text('remark')->nullable();
             $table->enum('dltStatus',array('N','Y'));
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
        Schema::dropIfExists('yoga_models');
    }
}

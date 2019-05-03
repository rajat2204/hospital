<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerumOfWidalModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serum_of_widal_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('referredBy')->nullable();
            $table->string('age')->nullable();
            $table->string('investigationAdvised')->nullable();
            $table->string('date')->nullable();
            $table->string('sTyphiO')->nullable();
            $table->string('sTyphiH')->nullable();
            $table->string('sTyphiAH')->nullable();
            $table->string('sTyphiBH')->nullable();
            $table->text('impression');
            $table->enum('dltStatus',array('N','Y'));
            $table->foreign('patientId')->references('id')->on('opd_models')->onDelete('cascade');
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
        Schema::dropIfExists('serum_of_widal_models');
    }
}

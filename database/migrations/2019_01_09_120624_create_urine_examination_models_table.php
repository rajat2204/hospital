<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrineExaminationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urine_examination_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('referredBy')->nullable();
            $table->string('age')->nullable();
            $table->string('investigationAdvised')->nullable();
            $table->string('date')->nullable();
            $table->string('sample')->nullable();
            $table->string('quantity')->nullable();
            $table->string('colour')->nullable();
            $table->string('spGravity')->nullable();
            $table->string('reaction')->nullable();
            $table->string('albumin')->nullable();
            $table->string('suger')->nullable();
            $table->string('bileSalts')->nullable();
            $table->string('bilePigments')->nullable();
            $table->string('acetone')->nullable();
            $table->string('benceJonesProteins')->nullable();
            $table->string('pusCells')->nullable();
            $table->string('epithellalCells')->nullable();
            $table->string('crystals')->nullable();
            $table->string('rbs')->nullable();
            $table->string('bacteria')->nullable();
            $table->string('cast')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('urine_examination_models');
    }
}

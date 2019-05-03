<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloodExaminationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_examination_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('referredBy')->nullable();
            $table->string('age')->nullable();
            $table->string('investigationAdvised')->nullable();
            $table->string('date')->nullable();
            $table->string('haemoglobin')->nullable();
            $table->string('totalRBCCount')->nullable();
            $table->string('totalWBCCount')->nullable();
            $table->string('polymorphs')->nullable();
            $table->string('lymphocytes')->nullable();
            $table->string('eosinophils')->nullable();
            $table->string('monocytes')->nullable();
            $table->string('basophils')->nullable();
            $table->string('ers')->nullable();
            $table->string('plateletCount')->nullable();
            $table->string('reticulocytes')->nullable();
            $table->string('pcv')->nullable();
            $table->string('mcv')->nullable();
            $table->string('mch')->nullable();
            $table->string('mchc')->nullable();
            $table->string('bleedingTime')->nullable();
            $table->string('clottingTime')->nullable();
            $table->string('malarialParasite')->nullable();
            $table->text('remark')->nullable();
            $table->enum('status',array('N','Y'));
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
        Schema::dropIfExists('blood_examination_models');
    }
}

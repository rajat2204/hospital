<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoolExaminationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stool_examination_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('referredBy')->nullable();
            $table->string('age')->nullable();
            $table->string('investigationAdvised')->nullable();
            $table->string('date')->nullable();
            $table->string('colour')->nullable();
            $table->string('consistency')->nullable();
            $table->string('mucus')->nullable();
            $table->string('blood')->nullable();
            $table->string('pusCells')->nullable();
            $table->string('rbcs')->nullable();
            $table->string('vegetableMatter')->nullable();
            $table->string('cysts')->nullable();
            $table->string('giardia')->nullable();
            $table->string('eHistolytica')->nullable();
            $table->string('eCoil')->nullable();
            $table->string('ova')->nullable();
            $table->string('worms')->nullable();
            $table->string('occultBlood')->nullable();
            $table->string('reducingSubstances')->nullable();
            $table->text('other')->nullable();
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
        Schema::dropIfExists('stool_examination_models');
    }
}

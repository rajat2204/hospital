<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpdTreatmentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipd_treatment_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('ipdId');
            $table->string('refTo')->nullable();
            $table->text('complaint')->nullable();
            $table->text('treatment');
            $table->string('medicine');
            $table->string('potency')->nullable();
            $table->string('nod')->nullable();
            $table->text('advice')->nullable();
            $table->text('remark')->nullable();
            $table->string('consultant')->nullable();
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
        Schema::dropIfExists('ipd_treatment_models');
    }
}

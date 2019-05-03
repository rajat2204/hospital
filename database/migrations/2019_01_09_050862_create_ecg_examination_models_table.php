<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcgExaminationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecg_examination_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('referredBy');
            $table->string('age');
            $table->string('date');
            $table->text('remark')->nullbale();
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
        Schema::dropIfExists('ecg_examination_models');
    }
}

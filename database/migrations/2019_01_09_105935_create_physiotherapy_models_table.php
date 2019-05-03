<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiotherapyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiotherapy_models', function (Blueprint $table) {
             $table->increments('id');
             $table->string('patientId');
             $table->string('referredBy')->nullable();
             $table->string('age')->nullable();
             $table->text('investigationAdvised')->nullable();
             $table->string('phyadate')->nullable();
             $table->string('disease');
             $table->string('therapy');
             $table->string('other')->nullable();
             $table->text('remark')->nullable();
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
        Schema::dropIfExists('physiotherapy_models');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('opdDate')->nullable();
            $table->string('ipdRegNum')->nullable();
            $table->string('ipdRegDate')->nullable();
            $table->string('otDate')->nullable();
            $table->text('dignosis')->nullable();
            $table->text('otProcessure')->nullable();
            $table->string('consultant')->nullable();
            $table->string('otherConsultant')->nullable();
            $table->text('adviceTreatment')->nullable();
            $table->text('medicine1')->nullable();
            $table->text('medicine2')->nullable();
            $table->text('medicine3')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('ot_models');
    }
}

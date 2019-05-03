<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpdModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipd_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patientId');
            $table->string('opdDate');
            $table->string('ipdRegNum');
            $table->string('ipdRegDate');
            $table->string('consultant')->nullable();
            $table->string('otherConsultant')->nullable();
            $table->string('prefixName')->nullable();
            $table->string('refName')->nullable();
            $table->string('wardName')->nullable();
            $table->string('bedNum')->nullable();
            $table->string('dod')->nullable();
            $table->string('provisionalDiagnosis')->nullable();
            $table->string('chiefComplaints')->nullable();
            $table->string('pastHistory')->nullable();
            $table->string('fh_maternal')->nullable();
            $table->string('fh_paternal')->nullable();
            $table->string('fh_other')->nullable();
            $table->string('ge_gc')->nullable();
            $table->string('ge_anaemla')->nullable();
            $table->string('ge_bowel')->nullable();
            $table->string('ge_pulse')->nullable();
            $table->string('ge_jvp')->nullable();
            $table->string('ge_sleep')->nullable();
            $table->string('ge_temp')->nullable();
            $table->string('ge_oedema')->nullable();
            $table->string('ge_allergies')->nullable();
            $table->string('ge_resp')->nullable();
            $table->string('ge_cyanosis')->nullable();
            $table->string('ge_skin')->nullable();
            $table->string('ge_bp')->nullable();
            $table->string('ge_thirst')->nullable();
            $table->string('ge_tongue')->nullable();
            $table->string('ge_lymph')->nullable();
            $table->string('ge_addictions')->nullable();
            $table->string('ge_conjective')->nullable();
            $table->string('ge_throat')->nullable();
            $table->string('ge_diet')->nullable();
            $table->string('ge_appetite')->nullable();
            $table->string('ecgTest')->nullable();
            $table->string('respiratorySystem')->nullable();
            $table->string('gastroIntestinalSystem')->nullable();
            $table->string('cardioVascularSystem')->nullable();
            $table->string('centralNervousSystem')->nullable();
            $table->string('localExamination')->nullable();
            $table->string('investigation1')->nullable();
            $table->string('investigation2')->nullable();
            $table->string('investigation3')->nullable();
            $table->string('medicine1')->nullable();
            $table->string('potency1')->nullable();
            $table->string('medicine2')->nullable();
            $table->string('potency2')->nullable();
            $table->string('medicine3')->nullable();
            $table->string('potency3')->nullable();
            $table->string('dietPlan1')->nullable();
            $table->text('diet1Text')->nullable();
            $table->string('dietPlan2')->nullable();
            $table->text('diet2Text')->nullable();
            $table->string('yoga');
            $table->string('physiotherapy');
            $table->text('remark')->nullbale();
            $table->enum('dltStatus',array('N','Y'));
            $table->softDeletes();
            $table->foreign('patientId')->references('id')->on('opd_models')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ipd_models');
    }
}

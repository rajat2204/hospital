<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentDateToIpdTreatmentModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ipd_treatment_models', function (Blueprint $table) {
           $table->date('treatment_date')->after('treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ipd_treatment_models', function (Blueprint $table) {
            //
        });
    }
}

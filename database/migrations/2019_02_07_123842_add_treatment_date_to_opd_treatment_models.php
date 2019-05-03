<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTreatmentDateToOpdTreatmentModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opd_treatment_models', function (Blueprint $table) {
           $table->date('treatment_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opd_treatment_models', function (Blueprint $table) {
            //
        });
    }
}

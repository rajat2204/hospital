<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferbyToOtModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ot_models', function (Blueprint $table) {
            $table->string('referby')->after('consultant');
            //$table->enum('dltStatus',array('N','Y'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ot_models', function (Blueprint $table) {
            //
        });
    }
}

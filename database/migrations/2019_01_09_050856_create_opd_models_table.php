<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpdModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opd_models', function (Blueprint $table) {
            $table->increments('orderId');
            $table->string('id')->unique()->index();
            $table->string('patientTitle')->nullable();
            $table->string('patientName')->nullable();
            $table->string('regNum')->unique();
            $table->string('regDate')->nullable();
            $table->string('regAmount')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('contactNum')->nullable();
            $table->string('consultant')->nullable();
            $table->string('otherConsultant')->nullable();
            $table->string('department')->nullable();
            $table->enum('patientType',array('O','N'));
            $table->enum('patientTypeIpd',array('O','N'));
            $table->enum('dltStatus',array('N','Y'));
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
        Schema::dropIfExists('opd_models');
    }
}

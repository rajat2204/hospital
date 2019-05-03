<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminSettingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_setting_models', function (Blueprint $table) {
            $table->increments('id');
              $table->string('website_title');
              $table->string('lock_time');
              $table->string('logo_image');
              $table->string('fbLink')->nullable();
              $table->string('twLink')->nullable();
              $table->string('goLink')->nullable();
              $table->string('lnLink')->nullable();
              $table->string('contact')->nullable();
              $table->string('email')->nullable();
              $table->string('address')->nullable();
              $table->string('openingHrs')->nullable();
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
        Schema::dropIfExists('admin_setting_models');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EspecialidadArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_area', function (Blueprint $table) {
          $table->integer('especialidad_id')->unsigned();
          $table->integer('area_id')->unsigned();
          $table->timestamps();

          $table->foreign('especialidad_id')->references('id')->on('especialidad');
          $table->foreign('area_id')->references('id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especialidad_area', function (Blueprint $table) {
            //
        });
    }
}

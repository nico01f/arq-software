<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Epicrisis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epicrisis', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('paciente_id')->unsigned();
          $table->integer('area_id');
          $table->integer('estado_epicrisis_id')->unsigned();
          $table->integer('funcionario_resp_id')->nullable();
          $table->integer('funcionario_enf_id');
          $table->tinyInteger('eliminado')->default(0);
          $table->timestamps();

          $table->foreign('paciente_id')->references('id')->on('paciente');
          $table->foreign('estado_epicrisis_id')->references('id')->on('estado_epicrisis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('epicrisis', function (Blueprint $table) {
            //
        });
    }
}

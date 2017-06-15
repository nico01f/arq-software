<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
          $table->increments('id');
          $table->string('rut')->unique();
          $table->string('nombre');
          $table->string('appelidop');
          $table->string('appelidom');
          $table->string('sexo');
          $table->date('fec_nac');
          $table->integer('prevision_id')->unsigned();
          $table->tinyInteger('eliminado')->default(0);
          $table->timestamps();

          $table->foreign('prevision_id')->references('id')->on('prevision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paciente', function (Blueprint $table) {
            //
        });
    }
}

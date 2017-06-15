<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Funcionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
          $table->increments('id');
          $table->string('rut')->unique();
          $table->string('nombre');
          $table->string('appelidop');
          $table->string('appelidom');
          $table->string('email')->unique();
          $table->string('password');
          $table->integer('estado_funcionario_id')->unsigned();
          $table->integer('especialidad_id')->unsigned();
          $table->integer('tipo_funcionario_id')->unsigned();
          $table->tinyInteger('eliminado')->default(0);
          $table->rememberToken();
          $table->timestamps();

          $table->foreign('estado_funcionario_id')->references('id')->on('estado_funcionario');
          $table->foreign('especialidad_id')->references('id')->on('especialidad');
          $table->foreign('tipo_funcionario_id')->references('id')->on('tipo_funcionario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funcionario', function (Blueprint $table) {
            //
        });
    }
}

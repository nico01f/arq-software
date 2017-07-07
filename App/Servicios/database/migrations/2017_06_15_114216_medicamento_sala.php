<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicamentoSala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_sala', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('epicrisis_id')->unsigned();
          $table->string('valor');
          $table->string('dosis');
          $table->integer('funcionario_id');
          $table->tinyInteger('eliminado')->default(0);
          $table->timestamps();

          $table->foreign('epicrisis_id')->references('id')->on('epicrisis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamento_sala', function (Blueprint $table) {
            //
        });
    }
}

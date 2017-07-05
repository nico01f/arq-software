<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Antecedente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->integer('epicrisis_id')->unsigned();
          $table->string('valor', 500);
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
        Schema::table('antecedente', function (Blueprint $table) {
            //
        });
    }
}

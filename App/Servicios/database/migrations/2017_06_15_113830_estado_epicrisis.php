<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstadoEpicrisis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_epicrisis', function (Blueprint $table) {
          $table->increments('id');
          $table->string('valor');
          $table->tinyInteger('eliminado')->default(0);
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
        Schema::table('estado_epicrisis', function (Blueprint $table) {
            //
        });
    }
}

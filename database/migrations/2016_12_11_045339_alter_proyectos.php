<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('Proyectos', function ($table) {
        $table->enum('tipo', ['VIVIENDA', 'SALUD', 'ALIMENTOS', 'EDUCACION', 'MEDIO_AMBIENTE', 'ORIENTACION_SOCIAL']);
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

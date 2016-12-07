<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Municipios', function (Blueprint $table) {
          $table->string('idMunicipio');
          $table->primary('idMunicipio');
          $table->integer('claveMunicipio');
          $table->string('nombre');
          $table->integer('idEstado');
          $table->foreign('idEstado')
                ->references('idEstado')->on('Estados')
                ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Municipios');
    }
}

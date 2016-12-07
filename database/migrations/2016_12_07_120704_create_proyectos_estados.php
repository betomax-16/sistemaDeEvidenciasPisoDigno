<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Proyectos_Estados', function (Blueprint $table) {
          $table->string('proyecto');
          $table->integer('idEstado');
          $table->foreign('idEstado')
                ->references('idEstado')->on('Estados')
                ->onDelete('cascade');
          $table->foreign('proyecto')
                ->references('nombre')->on('Proyectos')
                ->onDelete('cascade');
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
        Schema::drop('Proyectos_Estados');
    }
}

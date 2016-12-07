<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosProyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Usuarios_Proyectos', function (Blueprint $table) {
          $table->integer('idUsuario')->unsigned();
          $table->string('proyecto');
          $table->foreign('idUsuario')
                ->references('idUsuario')->on('Usuarios')
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
        Schema::drop('Usuarios_Proyectos');
    }
}

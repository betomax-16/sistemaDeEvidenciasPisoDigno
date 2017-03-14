<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProyectosYEdicionDeClavesForaneas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('Beneficiados', function ($table) {
        $table->dropForeign('hogares_proyecto_foreign');
      });
      Schema::table('Usuarios_Proyectos', function ($table) {
        $table->dropForeign('usuarios_proyectos_proyecto_foreign');
      });
      Schema::table('Beneficiados', function (Blueprint $table) {
        $table->dropColumn('proyecto');
      });
      Schema::table('Usuarios_Proyectos', function (Blueprint $table) {
        $table->dropColumn('proyecto');
      });
      Schema::table('Proyectos', function ($table) {
        $table->dropPrimary('Proyectos_nombre_primary');
      });
      Schema::table('Proyectos', function ($table) {
        $table->increments('idProyecto');
        $table->string('descripcion', 255);
        $table->unique('nombre');
      });
      Schema::table('Beneficiados', function (Blueprint $table) {
        $table->integer('proyecto')->unsigned();
        $table->foreign('proyecto')
          ->references('idProyecto')->on('Proyectos')
          ->onDelete('cascade');
      });
      Schema::table('Usuarios_Proyectos', function (Blueprint $table) {
        $table->integer('proyecto')->unsigned();
        $table->foreign('proyecto')
          ->references('idProyecto')->on('Proyectos')
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
        //
    }
}

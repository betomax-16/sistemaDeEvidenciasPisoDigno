<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Localidades', function (Blueprint $table) {
          $table->string('idLocalidad');
          $table->primary('idLocalidad');
          $table->string('nombre');
          $table->string('idMunicipio');
          $table->foreign('idMunicipio')
                ->references('idMunicipio')->on('Municipios')
                ->onDelete('cascade');
      });

      Schema::create('Hogares', function (Blueprint $table) {
          $table->bigIncrements('idHogar');
          $table->string('familia');
          $table->double('area');
          $table->string('idLocalidad');
          $table->timestamps();
          $table->foreign('idLocalidad')
                ->references('idLocalidad')->on('Localidades')
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
        Schema::drop('Localidades');
        Schema::drop('Hogares');
    }
}

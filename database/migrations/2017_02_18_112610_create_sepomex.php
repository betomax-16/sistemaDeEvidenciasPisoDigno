<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSepomex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sepomex', function (Blueprint $table) {
          $table->smallInteger('idEstado')->unsigned();
          $table->string('estado', 35);
          $table->smallInteger('idMunicipio')->unsigned();
          $table->string('municipio', 60);
          $table->string('ciudad', 60)->nullable();
          $table->string('zona', 15);
          $table->mediumInteger('cp');
          $table->string('asentamiento', 70);
          $table->string('tipo', 25);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sepomex');
    }
}

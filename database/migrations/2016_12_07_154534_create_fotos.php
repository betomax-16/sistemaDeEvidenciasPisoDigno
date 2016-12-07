<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Fotos', function (Blueprint $table) {
          $table->bigIncrements('idFoto');
          $table->integer('idHogar')->unsigned();
          $table->string('nombreArchivo');
          $table->enum('tipo', ['PISO_ORIGINAL', 'PISO_EN_PROCESO','PISO_TERMINADO','OTROS'])->default('OTROS');
          $table->timestamps();
          $table->foreign('idHogar')
                ->references('idHogar')->on('Hogares')
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
        Schema::drop('Fotos');
    }
}

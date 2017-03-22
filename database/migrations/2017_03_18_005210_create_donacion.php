<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Donaciones', function (Blueprint $table) {
        $table->string('email');
        $table->string('nombre');
        $table->string('apellidoPaterno');
        $table->string('apellidoMaterno');
        $table->string('rfc')->nullable();
        $table->string('colonia')->nullable();
        $table->string('direccion')->nullable();
        $table->string('cp', 5)->nullable();
        $table->decimal('monto',19, 2)->nullable();
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
        Schema::drop('Donaciones');
    }
}

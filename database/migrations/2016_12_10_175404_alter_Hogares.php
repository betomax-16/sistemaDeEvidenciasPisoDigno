<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterHogares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Hogares', function ($table) {
          $table->string('proyecto');
          $table->foreign('proyecto')
                ->references('nombre')->on('Proyectos')
                ->onDelete('cascade');
          $table->dropColumn('area');
        });

        Schema::rename('Hogares', 'Beneficiados');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Beneficiados');
    }
}

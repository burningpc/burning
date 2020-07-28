<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut_academico');
            $table->string('rut_evaluador1');
            $table->string('rut_evaluador2');
            $table->float('calificacion_anterior');
            $table->string('observacion_anterior');
            $table->float('docencia_tiempo');
            $table->float('investigacion_tiempo');
            $table->float('extension_tiempo');
            $table->float('administracion_tiempo');
            $table->float('otras_tiempo');
            $table->float('docencia_nota');
            $table->float('investigacion_nota');
            $table->float('extension_nota');
            $table->float('administracion_nota');
            $table->float('otras_nota');
            $table->float('calificacion_final');
            $table->string('observacion_final');
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
        Schema::dropIfExists('evaluaciones');
    }
}

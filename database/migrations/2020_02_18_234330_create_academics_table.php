<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut')->unique();
            $table->string('nombre_1');
            $table->string('nombre_2')->default('-');
            $table->string('apellido_1');
            $table->string('apellido_2')->default('-');
            $table->string('titulo');
            $table->string('grado');
            $table->string('depto');
            $table->string('categoria');
            $table->float('hrs_contrato');
            $table->string('planta');
            $table->string('estado');
            $table->float('promedio')->default(0);;
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
        Schema::dropIfExists('academics');
    }
}

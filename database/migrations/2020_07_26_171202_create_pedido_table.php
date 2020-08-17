<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_carrito');
            $table->string('infoCarrito');
            $table->bigInteger('total');
            $table->string('rut_cliente');
            $table->string('rut_vendedor');
            $table->string('rut_ensamblador');
            $table->date('fecha_compra');
            $table->date('fecha_envio');
            $table->string('descripcion');
            $table->bigInteger('num_tarjeta');
            $table->bigInteger('mes_tarjeta');
            $table->bigInteger('ano_tarjeta');
            $table->bigInteger('ccv_tarjeta');
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
        Schema::dropIfExists('pedido');
    }
}

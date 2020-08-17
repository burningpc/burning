<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable = ['id_carrito','infoCarrito', 'total','rut_cliente','rut_vendedor','rut_ensamblador','fecha_compra','fecha_envio','descripcion','num_tarjeta','mes_tarjeta','ano_tarjeta','ccv_tarjeta'];
    protected $table = ('pedido');
} 
 

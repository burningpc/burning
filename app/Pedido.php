<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
    protected $fillable = ['id_carrito','total','rut_cliente','rut_vendedor','fecha_compra','descripcion'];
    protected $table = ('pedido');
} 
 

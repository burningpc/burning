<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $fillable = ['id', 'rut_cliente','nombre_producto','precio_producto','cantidad_producto','precio_total'];
    protected $table = ('carrito');
} 
 
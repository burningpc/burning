<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = [
        'name', 'lastname1','lastname2','city','commune','addres','number','dni', 'email', 'typeuser'
    ];
    protected $table = ('clientes');

}

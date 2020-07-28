<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluacion extends Model
{
    protected $fillable = [
        'rut_academico',
        'rut_evaluador1',
        'rut_evaluador2', 
        'calificacion_anterior',
        'observacion_anterior',
        'docencia_tiempo' ,
        'investigacion_tiempo' ,
        'extension_tiempo' ,
        'administracion_tiempo' ,
        'otras_tiempo' ,
        'docencia_nota' ,
        'investigacion_nota' ,
        'extension_nota' ,
        'administracion_nota' ,
        'otras_nota' ,
        'calificacion_final' ,
        'observacion_final'];
    protected $table = ('evaluaciones');
}

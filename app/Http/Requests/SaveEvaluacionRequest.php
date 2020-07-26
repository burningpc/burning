<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEvaluacionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rut_academico' => 'required',
            'rut_evaluador1' => 'required',
            'rut_evaluador2' => 'required',
            'calificacion_anterior' => 'required | numeric',
            'observacion_anterior' => 'required',
            'docencia_tiempo' => 'required | numeric',
            'investigacion_tiempo' => 'required | numeric',
            'extension_tiempo' => 'required | numeric',
            'administracion_tiempo' => 'required | numeric',
            'otras_tiempo' => 'required | numeric',
            'docencia_nota' => 'required | numeric',
            'investigacion_nota' => 'required | numeric',
            'extension_nota' => 'required | numeric',
            'administracion_nota' => 'required | numeric',
            'otras_nota' => 'required | numeric',
            'calificacion_final' => 'required | numeric | max:7.0 | min:1.0',
            'observacion_final' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'rut_academico.required' => 'Se necesita rut del académico evaluado',
            'rut_evaluador1.required' => 'Se necesita rut del Decano de la Facultad',
            'rut_evaluador2.required' => 'Se necesita rut del usuario Secretario',
            'calificacion_anterior.required' => 'Se necesita calificacion anterior',
            'calificacion_anterior.numeric' => 'Calificacion anterior debe ser un número',
            'observacion_anterior.required' => 'Se necesita observacion anterior',
            'docencia_tiempo.required' => 'Tiempo de Actividad de docencia obligatorio',
            'investigacion_tiempo.required' => 'Tiempo de Actividad de investigación obligatorio',
            'extension_tiempo.required' => 'Tiempo de Extensión y vinculación obligatorio',
            'administracion_tiempo.required' => 'Tiempo de Admin. académica obligatorio',
            'otras_tiempo.required' => 'Tiempo de Otras actividades obligatorio',
            'docencia_nota.required' => 'Ponderación de Actividad de docencia obligatorio',
            'investigacion_nota.required' => 'Ponderación de Actividad de investigación obligatorio',
            'extension_nota.required' => 'Ponderación de Extensión y vinculación obligatorio',
            'administracion_nota.required' => 'Ponderación de Admin. académica obligatorio',
            'otras_nota.required' => 'Ponderación de Otras actividades obligatorio',
            'calificacion_final.required' => 'Campo Calificación final obligatorio',
            'docencia_tiempo.numeric' => 'Tiempo de Actividad de docencia debe ser un número',
            'investigacion_tiempo.numeric' => 'Tiempo de Actividad de investigación debe ser un número',
            'extension_tiempo.numeric' => 'Tiempo de Extensión y vinculación debe ser un número',
            'administracion_tiempo.numeric' => 'Tiempo de Admin. académica debe ser un número',
            'otras_tiempo.numeric' => 'Tiempo de Otras actividades debe ser un número',
            'docencia_nota.numeric' => 'Ponderación de Actividad de docencia debe ser un número',
            'investigacion_nota.numeric' => 'Ponderación de Actividad de investigación debe ser un número',
            'extension_nota.numeric' => 'Ponderación de Extensión y vinculación debe ser un número',
            'administracion_nota.numeric' => 'Ponderación de Admin. académica debe ser un número',
            'otras_nota.numeric' => 'Ponderación de Otras actividades debe ser un número',
            'calificacion_final.numeric' => 'Calificación final debe ser un número',
            'observacion.required' => 'Campo observación obligatorio',
        ];
    }
}
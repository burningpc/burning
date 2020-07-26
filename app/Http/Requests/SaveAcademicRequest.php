<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveAcademicRequest extends FormRequest
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
            'rut' => ['required', Rule::unique('academics', 'rut')->ignore($this->academic)],
            'nombre_1' => 'required',
            'apellido_1' => 'required',
            'titulo' => 'required',
            'grado' => 'required',
            'depto' => 'required | numeric',
            'categoria' => 'required',
            'hrs_contrato' => 'required | numeric | max:44 | min:1',
            'planta' => 'required',
            'estado' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'rut.required' => 'El académico necesita rut',
            'nombre_1.required' => 'Primer nombre obligatorio',
            'apellido_1.required' => 'Primer apellido obligatorio',
            'titulo.required' => 'Título profesional obligatorio',
            'grado.required' => 'Grado académico obligatorio',
            'depto.required' => 'Departamento obligatorio',
            'depto.numeric' => 'Debe indicar ID en el campo departamento',
            'categoria.required' => 'Categoria obligatorio',
            'hrs_contrato.required' => 'Horas de contrado obligatorias',
            'hrs_contrato.numeric' => 'Horas de contrado debe ser un número',
            'planta.required' => 'Tipo de planta obligatorio',
            'estado.required' => 'Activo o inactivo'
        ];
    }

}

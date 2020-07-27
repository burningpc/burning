<?php

namespace App\Exports;

use App\evaluacion;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;

class EvaluacionesExport implements FromCollection, WithHeadings, WithTitle, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $evaluacion;

    public function __construct($evaluacion = null)
    {
        $this->evaluacion = $evaluacion;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Rut academico',
            'Rut evaluador 1',
            'Rut evaluador 2', 
            'Calificación anterior',
            'Observacion anterior',
            '% de tiempo de Actividades de docencia' ,
            '% de tiempo de Actividades de investigación' ,
            '% de tiempo de Extension y vinculación' ,
            '% de tiempo de Administración' ,
            '% de tiempo de otras actividades' ,
            'Nota de Actividades de Docencia' ,
            'Nota de Actividades de investigación' ,
            'Nota de extensión y vinculación' ,
            'Nota de administración' ,
            'Nota de otras actividades' ,
            'Calificación' ,
            'Observación',
            'Fecha de evaluación',
            'Fecha de actualización de datos'
        ];
    }
    public function title(): string
    {
        return 'Pauta Resumen';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->getSheet()->setWidth(array(
                    'A'     =>  5,
                    'B'     =>  10
                ));
                
            }
        ];
    }

    public function collection()
    {

        return $this->evaluacion ?: evaluacion::all();
       //return evaluacion::all();
    }
}

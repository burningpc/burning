<?php

namespace App\Http\Controllers;

use App\evaluacion;
use App\departamento;
use App\Http\Requests\SaveEvaluacionRequest;
use App\Http\Requests\SaveAcademicRequest;
use App\Http\Controller\AcademicController;
use App\Academic;
use App\Charts\UserChart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class evaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $evaluaciones = evaluacion::all(); 

        $pdf = \PDF::loadView('pdf.evaluacion', compact('evaluaciones'));

        return $pdf->download('Evaluaciones_generales.pdf');
    }

    public function vertodo()
    {
        $evaluaciones = evaluacion::get();
        return view('evaluacion',[
            'evaluaciones' =>  $evaluaciones
        ]);
    }

    
    public function vertodop($rut)
    {
        $academic = academic::where('rut', $rut)->get();
        $evaluaciones = evaluacion::get();
        return view('evaluacionp',compact('evaluaciones','academic'));
    }

    public function pdfp($rut)
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $evaluaciones = evaluacion::all(); 
        $academic = academic::where('rut', $rut)->get();
        $pdf = \PDF::loadView('pdf.evaluacionp', compact('evaluaciones','academic'));

        return $pdf->download('Evaluacion_personal.pdf');
    }

    public function promedio(){
        $evaluacion = evaluacion::get();
        $academics = academic::get();
        foreach($academics as $aca){
            $total = 0;
            $cant = 0;
            $aca->update([
                'promedio' => 0,
            ]);
            foreach($evaluacion as $ev){
                if ($ev->rut_academico == $aca->rut) {
                    $total = $ev->calificacion_final + $total;
                    $cant = 1 + $cant;
                }
            }
            if($cant === 0){
                $cant = 1;
            }
            $media = $total/$cant;
            $aca->update([
                'promedio' => $media,
            ]);
        }
        $academics = academic::orderBy('promedio','DESC')->get();
        //Gráfico 2  
        // Instanciamos el objeto gráfico 
        $chart_bar = new UserChart;
        // Añadimos las etiquetas del eje X
        $label = array();
        $promedios = array();
        foreach($academics as $dato){
            if(empty($academics)){
                break;
            }
            array_push($label, $dato->rut);
            array_push($promedios, $dato->promedio);
        }
        
        $chart_bar->labels($label);
        $chart_bar->dataset("Promedio", 'bar', $promedios)->backgroundColor('rgba(0,100,255,0.5)');
         

        //Gráfico 3  
        $chart_pie = new UserChart;
        // Añadimos las etiquetas del eje X
        $label = ['Muy deficiente','Deficiente','Regular','Bueno','Muy bueno'];
        $muy_deficiente = array(); // muy deficiente(1-3)
        $deficiente = array();//deficiente(3.1-4)
        $regular = array();// regular(4.1-5)
        $bueno = array();// bueno(5.1-6)
        $muy_bueno = array();// muy bueno(6.1-7)
        
        foreach($academics as $dato){ 
            if(empty($academics)){
                break;
            }
            elseif($dato->promedio >= 1.0 && $dato->promedio <= 3.0){
                array_push($muy_deficiente, $dato->rut);
            }
            elseif($dato->promedio >= 3.1 && $dato->promedio <= 4.0){
                array_push($deficiente, $dato->rut);
            }
            elseif($dato->promedio >= 4.1 && $dato->promedio <= 5.0){
                array_push($regular, $dato->rut);
            }
            elseif($dato->promedio >= 5.1 && $dato->promedio <= 6.0){
                array_push($bueno, $dato->rut);
            }
            elseif($dato->promedio >= 6.1 && $dato->promedio <= 7.0){
                array_push($muy_bueno, $dato->rut);
            }
        }
        $promedios = [count($muy_deficiente),count($deficiente),count($regular),count($bueno),count($muy_bueno)];
        $chart_pie->labels($label);
        $chart_pie->dataset('Cantidad', 'pie', $promedios)->backgroundColor('rgba(0,100,255,0.9)');

        return view('evaluaciones.promedio', compact('academics', 'chart_bar', 'chart_pie'));
    }


    
    public function index()
    {
        if(Auth::user()->typeuser == 'Secretaria'){ 
            $id = Auth::user()->id; //Obtiene id de secretario actual logeado
            $depto = departamento::where('id_Secretaria', $id)->get(); //obtiene el depto de la secretaria
            $deptoAcademico = $depto[0]['id_Dept'];
            $datos = array();
            foreach(evaluacion::get() as $infoEval){
                foreach (Academic::where('depto', $deptoAcademico)->get() as $infoAcad) {
                    if($infoAcad->rut == $infoEval->rut_academico){
                        array_push($datos, $infoEval);
                    }
                }
            }
            return view('evaluaciones.index', [
                'evaluaciones' => $datos
            ]);

        }
        return view('evaluaciones.index', [
            'evaluaciones' => evaluacion::latest()->paginate(8)
        ]);
    }
    

    public function show($id)
    {
        return view('evaluaciones.show',[
            'evaluacion' =>  evaluacion::findOrFail($id)
        ]);
    }

    

    public function createEvaluation($id)
    {
        $evaluacionAnterior = evaluacion::get();
        $reverse = $evaluacionAnterior->reverse();
        $academic = academic::findOrfail($id);
        $i = $reverse->count()-1;
        if($i === -1){
            $i = 0;
            $reverse[$i] = new evaluacion;
            $reverse[$i]->calificacion_final = 0;
            $reverse[$i]->observacion_final = 0;
        }else{  
            while($i >= 0 ){
                if($reverse[$i]->rut_academico == $academic->rut){
                    break;
                }
                $i--;
            }
            if($i === -1){
                $i = 0;
                $reverse[$i] = new evaluacion;
                $reverse[$i]->calificacion_final = 0;
                $reverse[$i]->observacion_final = 0;   
            }
        }
        return view('evaluaciones.createEvaluation', [
            'evaluacion' => new evaluacion,
            'reverse' => $reverse,
            'academic' => academic::findOrfail($id),
            'i' => $i
        ]);
    }


    public function store(SaveEvaluacionRequest $request)
    {
        evaluacion::create( $request->validated());
        return redirect()->route('evaluaciones.index')->with('status', 'La evaluación fue ingresada con éxito');  
    }

    public function edit(evaluacion $evaluacion)
    {
        return view('evaluaciones.edit',[ 
            'evaluacion' =>  $evaluacion
        ]);
    }
    
    public function update(evaluacion $evaluacion, SaveEvaluacionRequest $request)
    {
        $evaluacion->update($request->validated());
        return redirect()->route('evaluaciones.show', $evaluacion)->with('status', 'La evaluación fue actualizada con éxito');  
    }

    public function destroy(evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return redirect()->route('evaluaciones.index')->with('status', 'La evaluación fue eliminada con éxito');;
    }
}

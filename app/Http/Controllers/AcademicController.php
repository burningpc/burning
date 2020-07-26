<?php

namespace App\Http\Controllers;

use App\Academic;
use App\evaluacion;
use App\departamento;
use App\Http\Requests\SaveEvaluacionRequest;
use App\Http\Requests\SaveAcademicRequest;
use Illuminate\Http\Request;
use App\Exports\EvaluacionesExport;
use Maatwebsite\Excel\Facades\Excel; 
use App\Charts\UserChart;
use Illuminate\Support\Facades\Auth;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        //$portafolio = DB::table('academics')->get(); // Sin crear archivo 'academic.php'
        if(Auth::user()->estado == 'activo'){
            if(Auth::user()->typeuser == 'Secretaria'){ 
                $id = Auth::user()->id; //Obtiene id de secretario actual logeado
                $depto = departamento::where('id_Secretaria', $id)->get(); //obtiene el depto de la secretaria
                $deptoAcademico = $depto[0]['id_Dept'];
                return view('academics.index', [
                    'academics' => Academic::where('depto', $deptoAcademico)->latest()->paginate(8) 
                ]);
            }
        }
        elseif(Auth::user()->typeuser == 'Administrador') {
            return view('academics.index', [
                'academics' => Academic::latest()->paginate(8) 
            ]);
        }
        return view('academics.index', [
            'academics' => Academic::where('id', 0)->latest()->paginate(8) 
        ]);
        
    }

    public function show($id)
    {
        $evaluaciones = evaluacion::get();
        $academic = Academic::findOrFail($id);
        $collection = collect([]);
        $concatenated = collect([]);
        foreach($evaluaciones as $evaluacion){
            if($evaluacion->rut_academico ==  $academic->rut){
                $concatenated = $collection->concat($concatenated)->concat([$evaluacion]);
            }      
        }
        //Grafico 1

        // Instanciamos el objeto gráfico 
        $chart = new UserChart;

        // Añadimos las etiquetas del eje X
        $label = array();
        $calificaciones = array();
        foreach($concatenated as $dato){
            if(empty($concatenated)){
                break;
            }
            array_push($label, $dato->id);
            array_push($calificaciones, $dato->calificacion_final);
        }
        
        $chart->labels($label);
        $chart->dataset("Calificación", 'bar', $calificaciones)->backgroundColor('rgba(0,0,255,0.5)');

        return view('academics.show',[
            'academic' => Academic::findOrFail($id),
            'concatenated' => $concatenated,
            'chart' => $chart
        ]);
    }
    public function create()
    {
        if(Auth::user()->estado == 'activo'){
            if(Auth::user()->typeuser == 'Secretaria'){ 
                $id = Auth::user()->id; //Obtiene id de secretario actual logeado
                $depto = departamento::where('id_Secretaria', $id)->get(); //obtiene el depto de la secretaria
                $deptoAcademico = $depto[0]['id_Dept'];
                return view('academics.create', [
                    'academic' => new Academic,
                    'depto_secretario' => $deptoAcademico
                ]);
        
            }
        }
        return view('academics.create', [
            'academic' => new Academic,
            'deptoAcademico' => departamento::get()
        ]);
    }

    public function store(SaveAcademicRequest $request)
    {
        Academic::create( $request->validated());
        return redirect()->route('academics.index')->with('status', 'El académico fue ingresado con éxito');  
    }
    public function edit(Academic $academic)
    {
        if(Auth::user()->estado == 'activo'){
            if(Auth::user()->typeuser == 'Secretaria'){ 
                $id = Auth::user()->id; //Obtiene id de secretario actual logeado
                $depto = departamento::where('id_Secretaria', $id)->get(); //obtiene el depto de la secretaria
                $deptoAcademico = $depto[0]['id_Dept'];
                return view('academics.edit', [
                    'academic' =>  $academic,
                    'depto_secretario' => $deptoAcademico
                ]);
        
            }
        }
        return view('academics.edit',[ 
            'academic' =>  $academic
        ]);
    }
    
    public function update(Academic $academic, SaveAcademicRequest $request)
    {
        $academic->update($request->validated());
        return redirect()->route('academics.show', $academic)->with('status', 'El académico fue actualizado con éxito');  
    }

    public function destroy(Academic $academic)
    {
        $evaluacion = evaluacion::get();
        foreach($evaluacion as $dato){
            if($dato->rut_academico == $academic->rut){
                $dato->delete();
            }
        }
        $academic->delete();
        return redirect()->route('academics.index')->with('status', 'El académico fue eliminado con éxito');  
    }

    public function export($rut) 
    {
        //$resumen = new EvaluacionesExport;
        //return $resumen->download('pautaResumen.xlsx');

        $resumen = evaluacion::where('rut_academico', '=', $rut)->get();
 
        return (new evaluacionesExport($resumen))->download('pautaResumen.xlsx');

    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Envio;
use App\Pedido;

class EnviosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::get();
        return view('ensamblador/envios', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('ensamblador/ingresarEnvio', compact('pedido'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut_ensamblador'=>'required',
            'rut_cliente'=>'required',
            'id_compra'=>'required',
            'fecha_entrega'=>'required'
        ]);
        
        $Envios = Envio::get();
        foreach ($Envios as $ItemEnvio) {
            if($ItemEnvio->id == $request->id_compra){
                $pedido = Pedido::findOrFail($request->id_compra);
                $pedido['fecha_envio'] = $request->fecha_entrega;
                $ItemEnvio['fecha_entrega'] = $request->fecha_entrega;
                $ItemEnvio->save();
                $pedido->save();
                return back()->with('mensaje', 'Fecha agregada'); 
            }
        }
        $newEnvio = new Envio;
        $newEnvio->id = $request->id_compra;
        $newEnvio->rut_ensamblador = $request->rut_ensamblador;
        $newEnvio->rut_cliente = $request->rut_cliente;
        $newEnvio->id_compra = $request->id_compra;
        $newEnvio->fecha_entrega = $request->fecha_entrega;
        
        $pedido = Pedido::findOrFail($request->id_compra);
        $pedido['fecha_envio'] = $request->fecha_entrega;
        $pedido->save();
        $newEnvio->save();

        return back()->with('mensaje', 'Fecha agregada'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $envio = Envio::findOrFail($id);
        return view('ensamblador/editar', compact('envio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rut_ensamblador'=>'required',
            'rut_cliente'=>'required',
            'id_compra'=>'required',
            'fecha_entrega'=>'required'
        ]);

        $envio = Envio::findOrFail($id);
        $envio->id = $request->id_compra;
        $envio->rut_ensamblador = $request->rut_ensamblador;
        $envio->rut_cliente = $request->rut_cliente;
        $envio->id_compra = $request->id_compra;
        $envio->fecha_entrega = $request->fecha_entrega;
        
        $pedido = Pedido::findOrFail($request->id_compra);
        $pedido['fecha_envio'] = $request->fecha_entrega;
        $pedido->save();
        $envio->save();

        return back()->with('mensaje', 'Fecha editada!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $envioEliminar = Envio::findOrFail($id);
        $envioEliminar->delete();

        return back()->with('mensaje','Producto eliminado');
    }

    public function destroyDate($id)
    {
        $envio = Envio::findOrFail($id);
        $pedido = Pedido::findOrFail($envio->id_compra);
        $envio['fecha_entrega'] = NULL;
        $pedido['fecha_envio'] = NULL;
        $pedido->save();
        $envio->save();
        return back()->with('mensaje','Fecha eliminida');
    }
}

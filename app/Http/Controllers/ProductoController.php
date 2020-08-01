<?php

namespace App\Http\Controllers;

use App\Producto;
use App\carrito;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('productos/producto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos/ingresar');
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
            'Nombre'=>'required',
            'Descripción'=>'required',
            'Precio'=>'required',
            'Cantidad'=>'required',
            'Tipo_producto'=>'required',
            'Imagen'=>'required'
        ]);
        $newProducto = new Producto;
        $newProducto->Nombre = $request->Nombre;
        $newProducto->Descripción = $request->Descripción;
        $newProducto->Precio = $request->Precio;
        $newProducto->Cantidad = $request->Cantidad;
        $newProducto->Tipo_producto = $request->Tipo_producto;
        
        if($request->hasFile('Imagen')){
            $newProducto->Imagen = $request->file('Imagen')->store('subidas','public');
        }
        

        $newProducto->save();

        return back()->with('mensaje', 'Producto agregado!'); 
        
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
        $producto = Producto::findOrFail($id);
        return view('productos/editar', compact('producto'));
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
            'Nombre'=>'required',
            'Descripción'=>'required',
            'Precio'=>'required',
            'Cantidad'=>'required',
            'Tipo_producto'=>'required',
            'Imagen'=>'required'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->Nombre = $request->Nombre;
        $producto->Descripción = $request->Descripción;
        $producto->Precio = $request->Precio;
        $producto->Cantidad = $request->Cantidad;
        $producto->Tipo_producto = $request->Tipo_producto;
        
        if($request->hasFile('Imagen')){
            $producto->Imagen = $request->file('Imagen')->store('subidas','public');
        }
        $producto->save();

        return back()->with('mensaje', 'Producto editado!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productoEliminar = Producto::findOrFail($id);
        $productoEliminar->delete();

        return back()->with('mensaje','Producto eliminado');
    }
}

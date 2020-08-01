<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\carrito;
use App\user; 
use Illuminate\Support\Facades\Auth;


class carritoController extends Controller
{

    public function show()
    {
        $carrito = carrito::get(); 
        return view('carrito.show', compact('carrito'));
    }

    public function añadir($id)
    {  
        $producto = Producto::findOrFail($id); 
        $auxCantidad = $producto['Cantidad'];
        $newPedido = new carrito; 
        $carrito = carrito::get(); 
        # ------ Actualización de stock ------
        foreach($carrito as $items){
            if($items['nombre_producto'] == $producto['Nombre']){
                $carritoItem = carrito::findOrFail($items['id']);
                $carritoItem->cantidad_producto = $items['cantidad_producto'] + 1;
                $carritoItem->save();

                $producto->Cantidad = $auxCantidad - 1; 

                $producto->save();

                return view('carrito.show', compact('carrito'));
            }
        } 
        # ------------------------------------
        $newPedido->id = $producto['id'];
        $newPedido->nombre_producto = $producto['Nombre'];
        $newPedido->precio_producto = $producto['Precio'];
        $newPedido->cantidad_producto = 1;
        $producto->Cantidad = $auxCantidad - 1; 
        
        $producto->save();
        $newPedido->save();

        return view('carrito.show', compact('carrito'));
    }
    public function destroy($id)
    {
        $productos_stock = Producto::get();
        $productoEliminar = carrito::findOrFail($id);
        foreach($productos_stock as $productos_stockItem){
            if($productoEliminar['nombre_producto'] == $productos_stockItem['Nombre']){
                $producto = Producto::findOrFail($productos_stockItem['id']);
                $producto->Cantidad = $producto['Cantidad'] + $productoEliminar['cantidad_producto'];
                $producto->save();
            }
        }

        $productoEliminar->delete();

        return back()->with('mensaje','Producto eliminado su pedido');
    }
    
    public function destroyAll()
    {
        $productos_stock = Producto::get();
        $carrito = carrito::get(); 
        foreach($carrito as $items){
            $carritoItem = carrito::findOrFail($items['id']);

            foreach($productos_stock as $productos_stockItem){
                if($carritoItem['nombre_producto'] == $productos_stockItem['Nombre']){
                    $producto = Producto::findOrFail($productos_stockItem['id']);
                    $producto->Cantidad = $producto['Cantidad'] + $carritoItem['cantidad_producto'];
                    $producto->save();
                }
            }


            $carritoItem->delete();
        }
        return back()->with('mensaje','Producto eliminado su pedido');
    }
 
}
 
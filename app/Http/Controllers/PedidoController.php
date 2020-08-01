<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Pedido;
use App\carrito;
use App\user;
use App\cliente; 

use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::get();//modificar el estado del vendedor una vez ocupado
        $cliente = cliente::get();
        $carrito = carrito::get();
        $pedido = pedido::get();
        foreach($cliente as $userCliente){
            if($userCliente->dni == Auth::user()->dni){
                break;
            }
            
        }

        return view('/pedidos/pedido', compact('pedido','carrito','user','userCliente'));///!!!!!!!!!!!!!
    }

    public function create()
    {
        return view('pedidos.add_pedido');
    }

    public function store(Request $request)
    {
        $user = user::get();//modificar el estado del vendedor una vez ocupado
        $carrito = carrito::get();
        $pedidos = pedido::get();

        $id_carro = 0;
        if ($user === null) { //para obtener id de boleta
            $id_carro = 1;
        }
        else{
            foreach($pedidos as $pedido){
                $id_carro = $pedido->id_carrito + 1;
            }
        }
        $total = 0;
        foreach($carrito as $car){ //Calcular total de la boleta
            $total = $total + ($car->precio_producto)*($car->cantidad_producto);
        }
        $fecha = new \DateTime(); 
        foreach($carrito as $car){ //fecha
            $fecha= $car->created_at;
        }
        if($request->observacion == null){
            $request->observacion = "...";
        } 

        $infoCarrito = "["; //Guardar datos en string para su posterior ingreso a tabla "pedido"
        foreach ($carrito as $item) {
            $infoCarrito = $infoCarrito . "[" . strval($item->id) . "," . strval($item->nombre_producto) . "," . strval($item->precio_producto) . "," . strval($item->cantidad_producto) . "], "; 
        } //String demasiado largo!!
        $infoCarrito = $infoCarrito . "0]";
        
        pedido::create([
            'id_carrito'=> $id_carro,
            'infoCarrito' => $infoCarrito,
            'total'=> $total,
            'rut_cliente'=>$request->Rut1,
            'rut_vendedor'=>"000", //cambiar por $request->ID2 (rut vendedor)
            'fecha_compra'=> $fecha,
            'descripcion'=> $request->observacion,
            'num_tarjeta' => $request->numcard,
            'mes_tarjeta' => $request->mes,
            'ano_tarjeta' => $request->ano,
            'ccv_tarjeta' => $request->CCV
        ]);
   
        # Vaciar carro cuando presiona "pagar"
        foreach($carrito as $items){
            $items->delete();
        }
 
        
        return redirect()->route('mostrar_producto');
    }
}

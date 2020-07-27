<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Pedido;
use App\carrito;
use App\user;

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
        $carrito = carrito::get();
        $pedidos = pedido::get();
        return view('pedidos/pedido', compact('pedido','carrito','user'));
    }

    public function create()
    {
        return view('pedidos.add_pedido');
    }

    public function store()
    {
        $id_carro = 0;
        $total = 0;
        $fecha = new \DateTime();
        echo $fecha->format('d-m-Y H:i:s');
        $user = user::get();//modificar el estado del vendedor una vez ocupado
        $carrito = carrito::get();
        $pedidos = pedido::get();

        if ($user === null) { //para obtener id de boleta
            $id_carro = 1;
        }
        else{
            foreach($pedidos as $pedido){
                $id_carro = $pedido->id_carrito + 1;
            }
        }


        foreach($carrito as $car){ //Calcular total de la boleta
            $total = $total + ($car->precio_producto)*($car->cantidad_producto);
        }

        foreach($carrito as $car){ //fecha
            $fecha= $car->created_at;
        }

        pedido::create([
            'id_carrito'=> $id_carro,
            'total'=> $total,
            'rut_cliente'=>request('Rut1'),
            'rut_vendedor'=>request('ID2'),
            'fecha_compra'=> $fecha,
            'descripcion'=>request('observacion')
        ]);
        return redirect()->route('pedidos.index');
    }
}

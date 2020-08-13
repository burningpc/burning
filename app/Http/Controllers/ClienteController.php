<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;
use App\carrito;
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        //
    }
    public function create()
    {
        $cliente = cliente::get();
        foreach($cliente as $userCliente){
            if($userCliente->dni == Auth::user()->dni){
                break;
            }
            
        }
        return view('usuarios/editcliente',compact('userCliente'));
    }


    public function Añadir(Request $request)
    {
        $cliente = cliente::get();
        $registrado = $cliente->first();//guarda el registro si existe
        $existe = 0; //1 si existe el registro
        foreach($cliente as $userCliente){
            if($userCliente->dni == Auth::user()->dni){
                $registrado = $userCliente;
                $existe = 1;
            }
        }
        if($existe == 0){
            $newcliente= new cliente;
            $newcliente->name = $request->name;
            $newcliente->lastname1 = $request->lastname1;
            $newcliente->lastname2 = $request->lastname2;
            $newcliente->city = $request->city;
            $newcliente->commune = $request->commune;
            $newcliente->addres  = $request->addres;
            $newcliente->number = $request->number;
            $newcliente->email = $request->email;
            $newcliente->dni = $request->dni;
            $newcliente->typeuser = "Cliente";
            $newcliente->save();
            return view('/home');  
        }
        else{
            $registrado ->update([
                'lastname2'=>request('lastname2'),
                'city' => request('city'),
                'commune' => request('commune'),
                'addres'  => request('addres'),
                'number' => request('number')
            ]);
            $carrito = carrito::get(); 
            return view('carrito.show', compact('carrito'));
        }

           

        
    }

}

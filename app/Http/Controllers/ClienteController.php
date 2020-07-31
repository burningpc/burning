<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cliente;


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
        return view('usuarios/editcliente');
    }


    public function Añadir(Request $request)
    {
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

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\facultad;
use App\user;
use App\departamento;

class facultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = facultad::get();

        return view('facultades.show',compact('facultades','usuarios'));
    }

    

    public function show()
    {
        $facultades = facultad::get();

        return view('facultades.show',compact('facultades','usuarios'));
    }

    public function indiv(Facultad $facultad)
    {
        $usuarios = user::get();
        return view('facultades.indiv', [
            'facultades' => $facultad,
            'usuarios' => $usuarios
            ]);
    }

    public function create()
    {
        $usuarios = user::get();
        return view('facultades.add_facultad',compact('usuarios'));
    }

    public function store()
    {
        facultad::create([
            'id_Decano'=>request('id_Decano'),
            'nombre'=>request('nombre'),
            'estado'=>request('estado'),
        ]);
        return redirect()->route('facultades.temporal');
    }

    public function temp()
    {
        $facultad = facultad::latest()->get();
        $usuarios = user::get();
        foreach($usuarios as $us){
            if($us->id == $facultad[0]->id_Decano){
                $us->update([
                    'estado' => 'activo',
                ]);
            }
        }
        return redirect()->route('facultades.show');
    }

    public function edit(Facultad $facultad)
    {
        $usuarios = user::get();
        return view('facultades.edit', [
        'facultad' => $facultad,
        'usuarios' => $usuarios
        ]);
    }

    public function update(Facultad $facultad)
    {
        $usuarios = user::get();
        $facultad->update([
            'nombre' => request('nombre'),
            'estado' => request('estado'),
            'id_Decano' => request('id_Decano'),
        ]);
        foreach($usuarios as $us){
            if($us->id == $facultad->id_Decano){
                $us->update([
                    'estado' => 'Activo'
                ]);
            }
        }
        return redirect()->route('facultades.show');
    }

    public function destroy(Facultad $facultad)
    {
        $facultad->delete();
        return redirect()->route('facultades.show');
    }

    public function usermod(User $usuario)
    {
        $facultades = facultad::get();
        $departamentos = departamento::get();
        $usuarios = user::get();
        foreach($facultades as $fac){
            if($fac->id_Decano == $usuario->id){
                $usuario->update([
                    'estado' => 'Inactivo',
                ]);
                foreach($departamentos as $dep){
                    if($dep->facultad === $fac->nombre){
                        foreach($usuarios as $us){
                            if($dep->id_Secretaria == $us->id){
                                $us->update([
                                    'estado' => 'Inactivo',
                                ]);
                            }
                        }
                        $dep->delete();
                    }
                }
                $fac->delete();
            }
        }
        return redirect()->route('facultades.show');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($id)
    {
        $reviews = Review::get();
        $producto = Producto::findOrFail($id);
        return view('reviews/review', compact('reviews', 'producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $producto = Producto::findOrFail($id);
        return view('reviews/ingresar', compact('producto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto'=>'required',
            'nombre_cliente'=>'required',
            'review'=>'required',
            'nota'=>'required'
        ]);
        $newReview = new Review;
        $newReview->id_producto = $request->id_producto;
        $newReview->id_cliente = Auth::user()->id;
        $newReview->nombre_cliente = $request->nombre_cliente;
        $newReview->review = $request->review;
        $newReview->nota = $request->nota;

        $newReview->save();

        return back()->with('mensaje', 'Producto clasificado!'); 

    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $producto = Producto::findOrFail($review->id_producto);
        return view('reviews/editar', compact('review','producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_producto'=>'required',
            'nombre_cliente'=>'required',
            'review'=>'required',
            'nota'=>'required'
        ]);

        $review = Review::findOrFail($id);
        $review->id_producto = $request->id_producto;
        $review->id_cliente = Auth::user()->id;
        $review->nombre_cliente = $request->nombre_cliente;
        $review->review = $request->review;
        $review->nota = $request->nota;

        $review->save();

        return back()->with('mensaje', 'Review editada!'); 
    }   

    public function destroy($id)
    {
        $reviewEliminar = Review::findOrFail($id);
        $reviewEliminar->delete();

        return back()->with('mensaje','Review eliminada');
    }

}

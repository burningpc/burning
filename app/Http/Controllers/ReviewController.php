<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Review;

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
        $newReview->nombre_cliente = $request->nombre_cliente;
        $newReview->review = $request->review;
        $newReview->nota = $request->nota;

        $newReview->save();

        return back()->with('mensaje', 'Producto clasificado!'); 

    }

}

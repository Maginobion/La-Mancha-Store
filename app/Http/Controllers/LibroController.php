<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return $libros;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $destination_path = "public/images";
        $path = $request->file('caratula')->store($destination_path);
        $real_path = str_replace("public/", "", $path);
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->caratula = $real_path;
        $libro->descripcion = $request->descripcion;
        $libro->precio = $request->precio;
        $libro->genero = $request->genero;

        $result = $libro->save();
        return "guardado";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $libro = Libro::find($request->id);
        return $libro;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $libro = Libro::findOrFail($request->id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->caratula = $request->file('caratula')->store('apiDocs');
        $libro->descripcion = $request->descripcion;
        $libro->precio = $request->precio;
        $libro->genero = $request->genero;

        $libro->save();

        return $libro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $libro = Libro::destroy($request->id);
        return $libro;
    }

    public function addSelection(Request $request)
    {

        $selection = Selection::all()->where("libro", $request->libro)->first();
        if (is_null($selection)) {
            $selection = new Selection();
        }
        $selection->id_usuario = $request->id_usuario;
        $selection->libro = $request->libro;
        $selection->cantidad = $selection->cantidad + 1;
        $selection->precio = $selection->precio + $request->precio;
        $selection->save();
    }
}

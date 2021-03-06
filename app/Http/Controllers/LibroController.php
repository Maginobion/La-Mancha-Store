<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Comprado;
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
        $image = $request->file('caratula');
        $imagename = $image->getClientOriginalName();
        $image->storeAs('caratulas', $imagename, 's3');

        $pdf = $request->file('readable');
        $pdfname = $pdf->getClientOriginalName();
        $pdf->storeAs('pdf', $pdfname, 's3');

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->caratula = $imagename;
        $libro->readable = $pdfname;
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
        $selection->id_libro = $request->id_libro;
        $selection->libro = $request->libro;
        $selection->precio = $selection->precio + $request->precio;
        $selection->save();
    }

    public function getLibrary(Request $request){
        $compradosUser = Comprado::all()->where("id_usuario", $request->id);
        $arr = [];
        foreach($compradosUser as $compra){
            $arr[]=$compra->id_libro;
        };
        return Libro::find($arr);
    }

    public function findLibrary(Request $request){
        $comprado = Comprado::all()
                    ->where("id_usuario", $request->id_usuario)
                    ->where("id_libro", $request->id_libro)
                    ->toArray();
        if($comprado==null){
            return "0";
        }
        return "1";
    }

    public function buyAll(Request $request, $id)
    {
        $lista = json_decode($request->lista);
        
        foreach($lista as $elemento){
            $bought = new Comprado();
            $bought->id_usuario = $request->id;       
            $bought->id_libro = $elemento->id_libro;
            $bought->finished = 0;
            $bought->page = 1;
            $bought->save();
        }

        $deletingItem = Selection::all()->where("id_usuario", $id);
        if($deletingItem) $deletingItem->each(function ($product, $key) {
            $product->delete();
        });
    }

    public function getImage(Request $request){
        $imagename = $request->caratula;
        return Storage::disk('s3')->response('caratulas/'.$imagename);
    }
}

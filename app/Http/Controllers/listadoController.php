<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use Illuminate\Http\Request;

class listadoController extends Controller
{
    public function obtenerListado(Request $request)
    {
        $listadoLibros = Selection::all()->where("id_usuario", $request->usuario);
        return $listadoLibros;
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Selection;
use Illuminate\Http\Request;
use App\Models\User;

class listadoController extends Controller
{
    public function obtenerListado(Request $request)
    {   
        $listadoLibros = Selection::all()->where("id_usuario", $request->usuario)->toArray();
        return $listadoLibros;
    }

    public function show(Request $request, $id)
    {   
        $seleccionado = Selection::all()
                        ->where("id_usuario", $request->id_usuario)
                        ->where("id_libro", $id)
                        ->toArray();
        if($seleccionado==null){
            return "0";
        }        
        else return "1";
    }

    public function deleteItemList(Request $request)
    {
        $deletingItem = Selection::findOrFail($request->id);
        if($deletingItem) $deletingItem->delete();
        else return response()->json(error);
    }
}

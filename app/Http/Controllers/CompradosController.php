<?php

namespace App\Http\Controllers;

use App\Models\Comprado;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;

class CompradosController extends Controller
{
    public function setCompleted(Request $request){
        $book = Comprado::all()
                ->where('id_usuario', $request->id_usuario)
                ->where('id_libro', $request->id_libro)
                ->first();
        $book->finished = 1;
        return $book->save();
    }

    public function getCompleted(Request $request){
        $book = Comprado::where('id_usuario', $request->id_usuario)
                ->where('id_libro', $request->id_libro)
                ->first();
        return $book->finished;
    }

    public function getLastPage(Request $request){
        $book = Comprado::where('id_usuario', $request->id_usuario)
                ->where('id_libro', $request->id_libro)
                ->first();
        return $book->page;
    }

    public function setLastPage(Request $request){
        $book = Comprado::all()
                ->where('id_usuario', $request->id_usuario)
                ->where('id_libro', $request->id_libro)
                ->first();
        $book->page = $request->page;
        return $book->save();
    }
}
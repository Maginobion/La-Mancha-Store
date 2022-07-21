<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return $users;
    }

    public function show(Request $request){
        $user = User::find($request->id);
        return $user;
    }

    public function patch(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:strict'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    }
}
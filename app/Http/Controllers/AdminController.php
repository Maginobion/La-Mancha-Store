<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function setAdmin(Request $request){
        $admin = new Admin();
        $admin->id_usuario = $request->id;
        $admin->save();
    }

    public function getState(Request $request){
        $admin = Admin::where('id_usuario',$request->id)->first();
        if($admin == null){
            return '0';
        }
        return '1';
    }
    public function removeAdmin(Request $request){
        $admins = Admin::all()->where('id_usuario',$request->id);
        if($admins) $admins->each(function ($admin, $key) {
            $admin->delete();
        });
    }
}
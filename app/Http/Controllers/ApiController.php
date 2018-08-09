<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //listar datos de ropa
    public function listCloth(Request $request){
        $cloth = Cloth::all();
        return view('test')->with('cloth',$cloth);
    }
    public function getAllCloth(Request $request){
        $cloth = Cloth::with('inventory')->orderBy('name')->get();
        return $cloth;

    }
}

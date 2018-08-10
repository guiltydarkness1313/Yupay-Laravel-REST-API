<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\Inventory;
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
    public function insertItem(Request $request){
        $stock = new Inventory();
        $item = new Cloth();
        $stock->stock = $request->input('stock');
        $stock->save();

        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->image = $request->input('image');
        $item->inventory_id = $stock->id;

        $item->save();

        return $item;

    }
}

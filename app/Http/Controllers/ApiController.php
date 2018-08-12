<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\Inventory;
use App\Models\Registry;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //listar datos de ropa
    public function listCloth(){
        $cloth = Cloth::all();
        return view('test')->with('cloth',$cloth);
    }
    //listar toda la ropa
    public function getAllCloth(){
        $cloth = Cloth::with('inventory')->orderBy('name')->get();
        return $cloth;
    }
    //new insert of cloth
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
    //new insert of registry
    public function insertRegistry(Request $request)
    {
        $ticket = new Ticket();
        $id=$request->input('id_cloth');
        $quantity = $request->input('quantity');
        $cloth = Cloth::find($id);
        $inventory = Inventory::find($cloth->inventory_id);
        $inventory->stock = $inventory->stock - $quantity;
        $inventory->save();
        $total_mount = $quantity * $cloth->price;
        $ticket->quantity = $quantity;
        $ticket->total_money = $total_mount;
        $ticket->save();

        $registry = new Registry();
        $registry->cloth_id = $cloth->id;
        $registry->cloth_inventory_id = $inventory->id;
        $registry->ticket_id = $ticket->id;
        $registry->save();

        $registry = Registry::with(['cloth','inventory','ticket'])->orderBy('registry_date')->get();
        return $registry;
    }
    //obtención de la lista de registros
    public function getAllRegistry(){
        $registry = Registry::with(['cloth','inventory','ticket'])->orderBy('registry_date')->get();
        return $registry;
    }
}

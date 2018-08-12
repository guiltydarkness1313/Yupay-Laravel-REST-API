<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    protected $table = 'inventory';
    public $timestamps = false;

    public function cloth(){
        return $this->belongsTo(Cloth::class,'inventory_id');
    }
    public function registry(){
        return $this->belongsTo(Registry::class,'cloth_inventory_id');
    }
}

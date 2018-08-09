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
}

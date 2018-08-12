<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    //
    protected $table = 'cloth';
    public $timestamps = false;

    public function inventory(){
        return $this->hasOne('App\Models\Inventory','id');
    }
    public function registry(){
        return $this->belongsTo(Registry::class,'cloth_id');
    }
}

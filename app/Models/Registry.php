<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    //
    protected $table = 'registry';
    public $timestamps = false;
    public function cloth(){
        return $this->hasMany('App\Models\Cloth','id');
    }
    public function ticket(){
        return $this->hasMany('App\Models\Ticket','id');
    }
    public function inventory(){
        return $this->hasMany('App\Models\Inventory','id');
    }
}

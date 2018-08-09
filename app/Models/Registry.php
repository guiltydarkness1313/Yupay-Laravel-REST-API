<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    //
    protected $table = 'registry';
    public $timestamps = false;
    public function cloth(){
        return $this->hasMany('App\Models\Cloth');
    }
}

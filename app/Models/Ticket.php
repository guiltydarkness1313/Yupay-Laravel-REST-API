<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table = 'ticket';
    public $timestamps = false;

    public function registry(){
        return $this->belongsTo(Registry::class,'ticket_id');
    }
}

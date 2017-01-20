<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MmaEventResult extends Model
{
    protected $guarded = [];
    
    public function mma_event() 
    {
        return $this->belongsTo('App\MmaEvent');
    }
}

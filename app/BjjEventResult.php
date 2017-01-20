<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BjjEventResult extends Model
{
    protected $guarded = [];

    public function bjj_event() 
    {
        return $this->belongsTo('App\BjjEvent');
    }
}

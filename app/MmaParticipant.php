<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MmaParticipant extends Model
{
    protected $guarded = [];

    public function mma_event()
    {
        return $this->belongsTo('App\MmaEvent');
    }
}

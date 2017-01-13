<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BjjEvent extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'event_start'];

    public function participants()
    {
        return $this->hasMany('App\BjjParticipant');
    }

    public function getFee($age_group){
        if($age_group == "Teen"){
            return Carbon::now()->diffInDays($this->event_start) <= 9 ? $this->teen_late_reg_fee : $this->teen_early_reg_fee;
        } else {
            return Carbon::now()->diffInDays($this->event_start) <= 9 ? $this->late_reg_fee : $this->early_reg_fee;
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationStatus extends Model
{
    protected $table = 'vacation_status';

    public function status()
    {
        return $this->belongsToMany('App\Vacation');
    }
}

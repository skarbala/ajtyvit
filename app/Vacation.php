<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable = [
        'vacation_from',
        'vacation_to',
        'user_id',
        'days_of_vacation',
        'status_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status(){
        return $this->belongsTo('App\VacationStatus');
    }
    public function isSubmitted(){
        return $this->status_id == 1;
    }

    public function cancelVacation(){
        return $this->update(['status_id'=>3]);
    }

    public function confirmVacation(){
        return $this->update(['status_id'=>2]);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Vacation;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'birthdate',
        'title_id',
        'days_of_vacation_left',
        'role_id',
    ];

    public function submittedVacation(){
        return $this->hasMany('App\Vacation')->where('status_id','1');
    }

    public function vacation(){
        return $this->hasMany('App\Vacation');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }


    public function getDaysOfVacationLeft(){
        $initialDaysOfVacation = User::getInitialDaysOfVacation($this->birthdate);
        $daysOfVacationLeft = $initialDaysOfVacation-$this->getDaysOfVacationUsed();
        return $daysOfVacationLeft;
    }

    public function getDaysOfVacationUsed(){
        return $this->vacation()->whereIn('status_id',[1,2])->sum('days_of_vacation');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','birthdate'
    ];

    public static function getInitialDaysOfVacation($birthdate){
        $howOld =Carbon::parse($birthdate)->age;
        if ($howOld>=33) {
            return 25;
        }
        return 20;
    }

    public function isAdmin()
    {
        foreach ($this->role()->get() as $role)
        {
            if ($role->role == 'ADMIN')
            {
                return true;
            }
        }
        return false;
    }
}

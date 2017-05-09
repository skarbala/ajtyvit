<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Title;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function show(){
        return view('auth.detail');
    }

}
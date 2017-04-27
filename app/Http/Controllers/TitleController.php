<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Title extends Controller
{
    public function getAll(){
    	return Title::All();
    }
}

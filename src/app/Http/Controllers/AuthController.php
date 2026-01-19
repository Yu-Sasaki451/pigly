<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerStep1(){
        return view('auth.user_register');
    }

    public function registerStep2(){
        return view('auth.weight_register');
    }
}

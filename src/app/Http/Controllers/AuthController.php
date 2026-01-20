<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class AuthController extends Controller
{
    public function registerStep1(){
        return view('auth.user_register');
    }

    public function registerStep2(){
        return view('auth.weight_register');
    }

    public function login(){
        return view('auth.login');
    }

    public function store(Request $request){

        $userId = auth()->id();
        $now = now();

        $weight_log_data = new WeightLog();
        $weight_log_data->user_id = $userId;
        $weight_log_data->date = $now;
        $weight_log_data->weight = $_POST["weight"];
        $weight_log_data->save();

        $weight_target_data = new WeightTarget();
        $weight_target_data->user_id = $userId;
        $weight_target_data->target_weight = $_POST["target_weight"];
        $weight_target_data->save();

        return redirect('/weight_logs');
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class AdminController extends Controller
{
    public function index(){

        $userId = 1;
        //$userId = auth()->id();

        $target_weight = weightTarget::where('user_id',$userId)->value('target_weight');

        $weightLogs = WeightLog::where('user_id',$userId)
        ->orderByDesc('date')
        ->paginate(8);


        $current_weight = $weightLogs->first()?->weight;

        $diff_target = (float)$target_weight - (float)$current_weight;

        return view('log.index',compact(
            'userId',
            'target_weight',
            'weightLogs',
            'current_weight',
            'diff_target',
        ));
    }
}

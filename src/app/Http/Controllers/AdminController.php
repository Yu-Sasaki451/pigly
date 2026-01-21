<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\WeightLogRequest;

class AdminController extends Controller
{
    public function index(){

        $userId = auth()->id();

        $target_weight = weightTarget::where('user_id',$userId)->value('target_weight');

        $weightLogs = WeightLog::where('user_id',$userId)
        ->orderByDesc('date')
        ->paginate(8);


        $current_weight = WeightLog::where('user_id', $userId)
        ->orderByDesc('date')
        ->value('weight');

        $diff_target = (float)$target_weight - (float)$current_weight;

        return view('log.index',compact(
            'userId',
            'target_weight',
            'weightLogs',
            'current_weight',
            'diff_target',
        ));
    }

    public function setTarget(){

        $userId = auth()->id();

        $target_weight = WeightTarget::where('user_id',$userId)->first();

        return view('log.weight_set',compact('target_weight'));

    }

    public function updateTarget(Request $request){

        WeightTarget::where('user_id', auth()->id())
            ->update(['target_weight' => $request->input('target_weight')]);

        return redirect('/weight_logs');
    }

    public function edit($id){
        $weight_log = WeightLog::find($id);

        return view('log.edit',compact('weight_log'));
    }

    public function updateLog(WeightLogRequest $request,$id){

        $weight_log = WeightLog::find($id);
        $weight_log->date = $_POST["date"];
        $weight_log->weight = $_POST["weight"];
        $weight_log->calories = $_POST["calories"];
        $weight_log->exercise_time = $_POST["exercise_time"];
        $weight_log->exercise_content = $_POST["exercise_content"];
        $weight_log->save();

        return redirect('/weight_logs');
    }

    public function create(){

        return view('modal');
    }

    public function store(Request $request){
        $userId = auth()->id();

        $weight_log = new WeightLog;
        $weight_log->user_id = $userId;
        $weight_log->date = $_POST['date'];
        $weight_log->weight = $_POST['weight'];
        $weight_log->calories = $_POST['calories'];
        $weight_log->exercise_time = $_POST['exercise_time'];
        $weight_log->exercise_content = $_POST['exercise_content'];
        $weight_log->save();

        return redirect('/weight_logs');

    }

    public function destroy($id){
        $weight_log = WeightLog::find($id);
        $weight_log->delete();

        return redirect('/weight_logs');
    }


}

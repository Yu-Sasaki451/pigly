<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\TargetRequest;

class AdminController extends Controller
{
        //管理画面
    public function index(Request $request){

        $userId = auth()->id();

        $target_weight = WeightTarget::where('user_id',$userId)->value('target_weight');

        $query = WeightLog::where('user_id',$userId)
                    ->orderByDesc('date');


        $current_weight = WeightLog::where('user_id', $userId)
        ->orderByDesc('date')
        ->value('weight');

        $diff_target = (float)$target_weight - (float)$current_weight;

        //検索機能
        $from = $request->input('from');
        $until = $request->input('until');

        $fromJa = $from ? \carbon\carbon::parse($from)->format('Y年n月j日'): '';
        $untilJa = $from ? \carbon\carbon::parse($until)->format('Y年n月j日'): '';


        if (!empty($from) && !empty($until)) {
        $query->whereBetween('date', [$from, $until]);
        }


        $weightLogs = $query->paginate(8)->appends($request->query());

        $total = $weightLogs->total();
        $searchResultText = $this->searchResult($total);

        return view('log.index',compact(
            'userId',
            'target_weight',
            'weightLogs',
            'current_weight',
            'diff_target',
            'fromJa',
            'untilJa',
            'searchResultText',
        ));
    }

    private function searchResult(int $total): string
    {
        if ($total === 0) {
            return '';
        }
        return "の検索結果{$total}件";
    }

        //目標体重画面
    public function setTarget(){

        $userId = auth()->id();

        $target_weight = WeightTarget::where('user_id',$userId)->first();

        return view('log.weight_set',compact('target_weight'));

    }
        //目標体重更新処理
    public function updateTarget(TargetRequest $request){

        WeightTarget::where('user_id', auth()->id())
            ->update(['target_weight' => $request->input('target_weight')]);

        return redirect('/weight_logs');
    }

        //Log変更画面
    public function edit($id){
        $weight_log = WeightLog::find($id);

        return view('log.edit',compact('weight_log'));
    }

        //Log更新処理
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

        //モーダル表示
    public function create(){

        return view('modal');
    }

        //Log登録処理
    public function store(WeightLogRequest $request){
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

        //Log削除処理
    public function destroy($id){
        $weight_log = WeightLog::find($id);
        $weight_log->delete();

        return redirect('/weight_logs');
    }



}

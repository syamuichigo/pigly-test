<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use App\Models\WeightLogs;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\LogsRequest;
use App\Http\Requests\TargetRequest;

class WeightController extends Controller
{
    public function admin()
    {
        $userId = Auth::id();
        $today = date('Y-m-d');
        $weight_logs = WeightLogs::where('user_id', $userId)->paginate(8);
        $target_weight = WeightTarget::where('user_id', $userId)->get('target_weight');
        $last_weight = WeightLogs::where('user_id', $userId)->latest('date')->first('weight');
        return view('admin', compact('today','weight_logs', 'target_weight', 'userId', 'last_weight'));
    }

    public function search(Request $request)
    {
        $userId = Auth::id();
        $weight_logs = WeightLogs::where('user_id', $userId)
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->paginate(8);
        $target_weight = WeightTarget::where('user_id', $userId)->get('target_weight');
        $last_weight = WeightLogs::where('user_id', $userId)->latest('date')->first('weight');
        return view('admin', compact('weight_logs', 'target_weight', 'userId', 'last_weight'));
    }

    public function add(LogsRequest $request)
    {
        $userId = Auth::user()->id;
        WeightLogs::create([
            'user_id' => $userId,
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);
        return redirect('/admin')->with('message', '記録を追加しました');
    }

    public function detail(Request $request)
    {
        $log = WeightLogs::where('id', $request->id)->first();
        return view('detail', compact('log'));
    }

    public function update(LogsRequest $request)
    {
        WeightLogs::where('id', $request->id)->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
        ]);
        return redirect('/admin')->with('message', '記録を更新しました');
    }

    public function delete(Request $request)
    {
        WeightLogs::find($request->id)->delete();
        return redirect('/admin')->with('message', '記録を削除しました');
    }

    public function target()
    {
        $target_weight = WeightTarget::all()->where('user_id', Auth::id())->first();
        return view('target', compact('target_weight'));
    }

    public function target_update(TargetRequest $request)
    {
        WeightTarget::find($request->id)->update([
            'target_weight' => $request->target_weight,
        ]);
        return redirect('/admin')->with('message', '目標体重を更新しました');
    }


    public function weight_register()
    {
        $user_id = Auth::id();
        return view('weight_register', compact('user_id'));
    }

    public function create_target(TargetRequest $request)
    {
        WeightTarget::create([
            'user_id' => $request->user_id,
            'target_weight' => $request->target_weight,
        ]);
        WeightLogs::create([
            'user_id' => $request->user_id,
            'weight' => $request->weight,
            'date' => now(),
        ]);
        return redirect('/admin')->with('message', '目標体重を登録しました');
    }
}

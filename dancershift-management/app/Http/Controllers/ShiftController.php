<?php

namespace App\Http\Controllers;

use App\Models\Dancers;
use App\Models\Positions;
use App\Models\Shifts;
use App\Models\Shows;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    
    public function shiftRegister() {
        $shows = Shows::get();
        $dancers = Dancers::get();
        $positions = [];
        $show_name = '';
        return view('shifts.register',['shows' => $shows, 'dancers' => $dancers , 'positions' => $positions, 'selected_show_name' => $show_name]);
    }

    public function searchPosition(Request $request) {
        $validated = $request -> validate([
            'show_name'=>'required'
        ]);
        $selected_show_id = $request->show_name;
        $shows = Shows::get();
        $dancers = Dancers::get();
        $selected_show_name = Shows::select('show_name')->where('show_id', $selected_show_id)->first()->show_name;
        $positions = Positions::where('show_id', $selected_show_id)->get();
        return view('shifts.register',compact('shows', 'positions', 'dancers', 'selected_show_name'));
    }

    public function store(Request $request) {
        // ダンサー名からIDの取得
        $dancer_id = Dancers::select('dancer_id')->where('dancer_name', $request->dancer_name)->first()->dancer_id;
        // OFFフラグ
        $offchecked = $request->off;
        if(!empty($offchecked)) {
            $off = 1;
        } else {
            $off = 0;
        }
        $validated = $request -> validate([
            // 'selected_show_name'=>'required',
            'dancer_name'=>'required',
            'checkedPosition'=>'nullable|required_without:off',
            'date'=>'date|required',
            'off'=>'nullable|required_without:checkedPosition|prohibits:checkedPosition'
        ]);
        $shift = Shifts::create([
            'dancer_id' => $dancer_id,
            'show_name' => $request->selected_show_name,
            'position' => $request->checkedPosition,
            'date' => $request->date,
            'off' => $off
        ]);

        return back()->with('message', '正常に登録されました。');
    }

    public function shiftFind() {
        $dancers = Dancers::get();
        $shifts = [];
        return view('shifts.find',compact('dancers', 'shifts'));
    }

    public function search(Request $request) {
        $validated = $request -> validate([
            // 'selected_show_name'=>'required',
            'dancer_name'=>'required',
        ]);
        $dancers = Dancers::get();
        $shifts = Shifts::where(['dancer_id' => $request->dancer_name,])->with('dancers')->get();
        return view('shifts.find',compact('dancers', 'shifts'));
    }

    public function shiftForecast() {
        $dancers = Dancers::get();
        $shows = Shows::get();
        $possibilities = [];
        return view('shifts.forecast', ['dancers'=>$dancers, 'shows'=>$shows, 'possibilities'=>$possibilities]);
    }


    public function forecast(Request $request) {
        $validated = $request -> validate([
            'show_name'=>'required',
            'dancer_name'=>'required',
            'date'=>'date|required',
        ]);

        $dateTime = new DateTime($request->date);
        $date = $dateTime->format('Y年m月d日');
        $weekday = $dateTime->format('w');
        
        // 対象日付の曜日番号を取得
        $possibilities = [];
        // 前日補正の係数
        // 前日に同ポジションで出ている場合
        $shifts = Shifts::where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNotNull('position')->where('dancer_id',$request->dancer_name)->get();
        $shiftCnt = Shifts::select('position', DB::raw("COUNT(position) as 'position_count'"))->where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNotNull('position')->where('dancer_id',$request->dancer_name)->groupBy('position')->get();
        $offRecs = Shifts::where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNull('position')->where('dancer_id',$request->dancer_name)->get();
        $offCnt = Shifts::select('position', DB::raw("COUNT(off) as 'position_count'"))->where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNull('position')->groupBy('position')->where('dancer_id',$request->dancer_name)->get();
        // 前日のポジション
        $yesterday = $dateTime->modify('-1 days');
        $yesterdayShift = Shifts::where('date', $yesterday)->where('dancer_id',$request->dancer_name)->first();
        if ($shifts->count() === 0 && $offRecs->count() === 0) {
            return back()->with('message', '該当する曜日のシフトが登録されていないため、予測できません')->with('possibilities', $possibilities);
        } else {
            // 各ポジションの割合を算出。
            foreach($shiftCnt as $shift) {
                $possibility = round($shift->position_count / ($shifts->count() + $offRecs->count()) * 100);
                if(!empty($yesterdayShift)) {
                    if(strcmp($shift->position, $yesterdayShift->position) == 0) {
                        // 前日と同ポジションの場合はアラート文
                        $possibilities = array_merge($possibilities, array($shift->position.'(前日と同じポジションです)'=>$possibility));
                    } else {
                        $possibilities = array_merge($possibilities, array($shift->position=>$possibility));
                    }
                } else {
                    $possibilities = array_merge($possibilities, array($shift->position=>$possibility));
                }
            }
            foreach($offCnt as $off) {
                $possibility = $off->position_count / ($shifts->count() + $offRecs->count()) * 100;
                $possibilities = array_merge($possibilities, array('OFF'=>$possibility));
            }
            $dancers = Dancers::get();
            $shows = Shows::get();
            return view('shifts.forecast',['dancers'=>$dancers, 'shows'=>$shows, 'date'=>$date, 'possibilities'=>$possibilities]);
        }
    }

    public function shiftEdit($id) {
        $shift = Shifts::with('dancers')->where('shift_id', $id)->first();
        $dancers = Dancers::get();
        $shows = Shows::get();
        $dancers = Dancers::get();
        $positions = [];
        $show_name = '';
        return view('shifts.edit', ['shows' => $shows, 'dancers' => $dancers , 'positions' => $positions, 'selected_show_name' => $show_name, 'shift' => $shift]);
    }

    public function shiftDelete($id) {
        $shift = Shifts::where('shift_id', $id)->first();
        return view('shifts.delete', compact('shift'));
    }

    public function update(Request $request, Shifts $shift) {
        $validated = $request -> validate([
            // 'selected_show_name'=>'required',
            'dancer_name'=>'required',
            'checkedPosition'=>'nullable|required_without:off',
            'date'=>'date|required',
            'off'=>'nullable|required_without:checkedPosition|prohibits:checkedPosition'
        ]);
        // OFFフラグ
        $offchecked = $request->off;
        if(!empty($offchecked)) {
            $off = 1;
        } else {
            $off = 0;
        }
        // ダンサー名からIDの取得
        $dancer_id = Dancers::select('dancer_id')->where('dancer_name', $request->dancer_name)->first()->dancer_id;
        $shift = Shifts::create([
            'dancer_id' => $dancer_id,
            'show_name' => $request->selected_show_name,
            'position' => $request->checkedPosition,
            'date' => $request->date,
            'off' => $off
        ]);

        return back()->with('message', '正常に更新されました。');
    }
    
    public function destroy($id) {
        $shift = Shifts::where('shift_id', $id)->delete();
        return redirect()->route('shifts.find')->with('message', '正常に削除されました。');
    }

    public function searchPositionEdit(Request $request) {
        $validated = $request -> validate([
            'show_name'=>'required'
        ]);
        $selected_show_id = $request->show_name;
        $shows = Shows::get();
        $selected_show_name = Shows::select('show_name')->where('show_id', $selected_show_id)->first()->show_name;
        $positions = Positions::where('show_id', $selected_show_id)->get();
        return view('shifts.register',compact('shows', 'positions', 'dancers', 'selected_show_name'));
    }
}

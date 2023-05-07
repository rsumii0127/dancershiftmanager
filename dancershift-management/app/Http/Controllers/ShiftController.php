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
        $shows = Shows::get();
        $dancers = Dancers::get();
        $positions = Positions::get();
        $shifts = [];
        return view('shifts.find',compact('shows', 'positions', 'dancers', 'shifts'));
    }

    public function search(Request $request) {
        $validated = $request -> validate([
            // 'selected_show_name'=>'required',
            'dancer_name'=>'required',
            'show_name'=>'required'
        ]);
        $shows = Shows::get();
        $dancers = Dancers::get();
        $positions = Positions::get();
        $shifts = Shifts::where(['dancer_id' => $request->dancer_name, 'show_name' => $request->show_name])->with('dancers')->get();
        return view('shifts.find',compact('shows', 'positions', 'dancers', 'shifts'));
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
        $shifts = Shifts::where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNotNull('position')->where('dancer_id',$request->dancer_name)->get();
        $shiftCnt = Shifts::select('position', DB::raw("COUNT(position) as 'position_count'"))->where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNotNull('position')->where('dancer_id',$request->dancer_name)->groupBy('position')->get();
        $offRecs = Shifts::where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNull('position')->where('dancer_id',$request->dancer_name)->get();
        $offCnt = Shifts::select('position', DB::raw("COUNT(position) as 'position_count'"))->where(DB::raw("DATE_FORMAT(date, '%w')"), $weekday)->whereNull('position')->groupBy('position')->where('dancer_id',$request->dancer_name)->get();
        if ($shifts->count() === 0 && $offRecs->count() === 0) {
            return back()->with('message', '該当する曜日のシフトが登録されていないため、予測できません')->with('possibilities', $possibilities);
        } else {
            // 各ポジションの割合を算出。
            foreach($shiftCnt as $shift) {
                $possibility = $shift->position_count / ($shifts->count() + $offRecs->count()) * 100;
                $possibilities = array_merge($possibilities, array($shift->position=>$possibility));
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use App\Models\Shows;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function positionRegister() {
        $shows = Shows::get();
        return view('positions.register', ['shows' => $shows]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'show_name' => 'required',
            'position_name' => 'required',
        ]);
        // show_idの取得
        $show = Shows::where('show_name', $request->show_name)->first();
        $positions = Positions::create([
            'position_name' => $request->position_name,
            'show_id' => $show->show_id
        ]);

        return back()->with('message', '正常に登録されました。');
    }

    public function positionIndex() {
        $positions = Positions::with('shows')->get();
        return view('positions.index', compact('positions'));
    }

    public function positionEdit($id) {
        $position = Positions::with('shows')->where('position_id', $id)->first();
        $shows = Shows::get();
        return view('positions.edit', compact('position', 'shows'));
    }

    public function positionDelete($id) {
        $position = Positions::where('position_id', $id)->first();
        return view('positions.delete', compact('position'));
    }

    public function update(Request $request, Positions $position) {
        $validated = $request->validate([
            'show_name' => 'required',
            'position_name' => 'required',
        ]);
        // show_idの取得
        $show = Shows::where('show_name', $request->show_name)->first();
       
        $position->update([
            'position_name' => $request->position_name,
            'show_id' => $show->show_id
        ]);

        return back()->with('message', '正常に更新されました。');
    }
    
    public function destroy($id) {
        $show = Positions::where('position_id', $id)->with()->delete();
        return redirect()->route('positions.index')->with('message', '正常に削除されました。');
    }
}

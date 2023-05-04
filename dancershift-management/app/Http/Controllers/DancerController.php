<?php

namespace App\Http\Controllers;

use App\Models\Dancers;
use App\Models\Shows;
use Illuminate\Http\Request;

class DancerController extends Controller
{
    public function dancerRegister() {
        $shows = Shows::get();
        return view('dancers.register', ['shows' => $shows]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'dancer_name'=>'required',
            'performance_park'=>'required',
            'performance_show_1'=>'required',
            'performance_show_2'=>'nullable'
        ]);

        $dancers = Dancers::create($validated);

        return back()->with('message', '正常に登録されました。');
    }

    public function dancerIndex() {
        $dancers = Dancers::get();
        return view('dancers.index', compact('dancers'));
    }

    public function dancerEdit($id) {
        $dancer = Dancers::where('dancer_id', $id)->first();
        return view('dancers.edit', compact('dancer'));
    }

    public function dancerDelete($id) {
        $dancer = Dancers::where('dancer_id', $id)->first();
        return view('dancers.delete', compact('dancer'));
    }

    public function update(Request $request, Shows $show) {
        $validated = $request->validate([
            'dancer_name'=>'required',
            'performance_park'=>'required',
            'performance_show_1'=>'required',
            'performance_show_2'=>'nullable'
        ]);

        $show->update($validated);

        return back()->with('message', '正常に更新されました。');
    }

    public function destroy($id) {
        $dancer = Dancers::where('dancer_id', $id)->delete();
        return redirect()->route('dancers.index')->with('message', '正常に削除されました。');
    }
}

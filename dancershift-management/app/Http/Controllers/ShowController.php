<?php

namespace App\Http\Controllers;

use App\Models\Shows;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function showRegister() {
        return view('shows.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'show_name' => 'required',
            'hold_park' => 'required',
            'show_type' => 'required',
            'start_date' => 'required | date',
            'end_date' => 'nullable | date'
        ]);

        $post = Shows::create($validated);

        return back()->with('message', '正常に登録されました。');
    }

    public function showIndex() {
        $shows = Shows::get();
        return view('shows.index', compact('shows'));
    }

    public function showEdit($id) {
        $show = Shows::where('show_id', $id)->first();
        return view('shows.edit', compact('show'));
    }

    public function showDelete($id) {
        $show = Shows::where('show_id', $id)->first();
        return view('shows.delete', compact('show'));
    }
    

    public function update(Request $request, Shows $show) {
        $validated = $request->validate([
            'show_name' => 'required',
            'hold_park' => 'required',
            'show_type' => 'required',
            'start_date' => 'required | date',
            'end_date' => 'nullable | date'
        ]);

        $show->update($validated);

        return back()->with('message', '正常に更新されました。');
    }

    public function destroy($id) {
        $show = Shows::where('show_id', $id)->delete();
        return redirect()->route('shows.index')->with('message', '正常に削除されました。');
    }

    public function showFind() {
        
    }
}

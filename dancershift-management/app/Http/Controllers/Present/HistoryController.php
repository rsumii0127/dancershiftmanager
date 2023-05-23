<?php

namespace App\Http\Controllers\Present;

use App\Http\Controllers\Controller;
use App\Models\Presents;
use Illuminate\Http\Request;

class HistoryController extends Controller
{

  public function historyRegister() {
    return view('present.history.register');
  }

  public function store(Request $request) {
    $validated = $request->validate([
      'present_name'=>'required',
      'brand'=>'required',
      'price'=>'required|numeric',
      'present_from'=>'required',
      'present_to'=>'required',
      'present_date'=>'required|date',
      'present_purpose'=>'required',
    ]);

    $presents = Presents::create($validated);

    return back()->with('message', '正常に登録されました。');
  }

  public function historyIndex() {
    $presents = Presents::get();
    return view('present.history.index', compact('presents'));
  }

  public function historyEdit($id) {
    $present = Presents::where('present_id', $id)->first();
    return view('present.history.edit', compact('present'));
  }

  public function historyDelete($id) {
    $present = Presents::where('present_id', $id)->first();
    return view('present.history.delete', compact('present'));
  }

  public function update(Request $request, Presents $present) {
    $validated = $request->validate([
      'present_name'=>'required',
      'brand'=>'required',
      'price'=>'required|numeric',
      'present_from'=>'required',
      'present_to'=>'required',
      'present_date'=>'required|date',
      'present_purpose'=>'required',
    ]);

    $present->update($validated);

    return back()->with('message', '正常に更新されました。');
  }

  public function destroy($id) {
    $present = Presents::where('present_id', $id)->delete();
    return redirect()->route('present.history.index')->with('message', '正常に削除されました。');
  }

  public function historyFind() {
    $presents = [];
    return view('present.history.find', compact('presents'));
}

}

?>
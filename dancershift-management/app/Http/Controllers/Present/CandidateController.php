<?php

namespace App\Http\Controllers\Present;

use App\Http\Controllers\Controller;
use App\Models\Candidates;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

  public function candidateRegister() {
    return view('present.candidate.register');
  }

  public function store(Request $request) {
    $validated = $request->validate([
      'present_name'=>'required',
      'brand'=>'required',
      'price'=>'required|numeric'
    ]);

    $candidates = Candidates::create($validated);

    return back()->with('message', '正常に登録されました。');
  }

  public function candidateIndex() {
    $candidates = Candidates::get();
    return view('present.candidate.index', compact('candidates'));
  }

  public function candidateEdit($id) {
    $candidate = Candidates::where('candidate_id', $id)->first();
    return view('presents.candidate.edit', compact('candidate'));
  }

  public function update(Request $request, Candidates $candidate) {
    $validated = $request->validate([
      'present_name'=>'required',
      'brand'=>'required',
      'price'=>'required|numeric'
    ]);

    $candidate->update($validated);

    return back()->with('message', '正常に更新されました。');
  }

  public function candidateDelete($id) {
    $candidate = Candidates::where('candidate_id', $id)->first();
    return view('present.candidate.delete', compact('candidate'));
  }

  public function destroy($id) {
    $candidate = Candidates::where('candidate_id', $id)->delete();
    return redirect()->route('present.candidate.index')->with('message', '正常に削除されました。');
  }


}

?>
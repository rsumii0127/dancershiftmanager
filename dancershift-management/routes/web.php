<?php

use App\Http\Controllers\DancerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Present\CandidateController;
use App\Http\Controllers\Present\HistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/shiftmanagement', function () {
    return view('shiftmanagement');
})->middleware(['auth', 'verified'])->name('shiftmanagement');

Route::get('/shiftmanagement/dancer/top', function () {
    return view('dancers.top');
})->name('dancer');

Route::get('/shiftmanagement/shift/top', function () {
    return view('shifts.top');
})->name('shift');

Route::get('/shiftmanagement/position/top', function () {
    return view('positions.top');
})->name('position');

Route::get('/shiftmanagement/show/top', function () {
    return view('shows.top');
})->name('show');

Route::get('/presentmanagement', function() {
    return view('presentmanagement');
})->middleware(['auth', 'verified'])->name('presentmanagement');

Route::get('/presentmanagement/history/top', function() {
    return view('present.history.top');
})->name('present.history');

Route::get('/presentmanagement/candidate/top', function() {
    return view('present.candidate.top');
})->name('present.candidate');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// dancer
Route::get('shiftmanagement/dancer/register', [DancerController::class, 'dancerRegister'])->name('dancers.register');
Route::get('shiftmanagement/dancer/index', [DancerController::class, 'dancerIndex'])->name('dancers.index');
Route::get('shiftmanagement/dancer/find', [DancerController::class, 'dancerFind'])->name('dancers.find');
Route::post('shiftmanagement/dancer', [DancerController::class, 'store']) -> name('dancers.store');
Route::get('shiftmanagement/dancer/edit/{dancer_id}', [DancerController::class, 'dancerEdit'])->name('dancers.edit');
Route::post('shiftmanagement/dancer/update', [DancerController::class, 'update'])->name('dancers.update');
Route::get('shiftmanagement/dancer/delete/{dancer_id}', [DancerController::class, 'dancerDelete'])->name('dancers.delete');
Route::post('shiftmanagement/dancer/destroy/{dancer_id}', [DancerController::class, 'destroy'])->name('dancers.destroy');

// show
Route::get('shiftmanagement/show/register', [ShowController::class, 'showRegister'])->name('shows.register');
Route::get('shiftmanagement/show/index', [ShowController::class, 'showIndex'])->name('shows.index');
Route::get('shiftmanagement/show/find', [ShowController::class, 'showFind'])->name('shows.find');
Route::post('shiftmanagement/show', [ShowController::class, 'store']) -> name('shows.store');
Route::get('shiftmanagement/show/edit/{show_id}', [ShowController::class, 'showEdit'])->name('shows.edit');
Route::post('shiftmanagement/show/update', [ShowController::class, 'update'])->name('shows.update');
Route::get('shiftmanagement/show/delete/{show_id}', [ShowController::class, 'showDelete'])->name('shows.delete');
Route::post('shiftmanagement/show/destroy/{show_id}', [ShowController::class, 'destroy'])->name('shows.destroy');

// shift
Route::get('shiftmanagement/shift/register', [ShiftController::class, 'shiftRegister'])->name('shifts.register');
Route::get('shiftmanagement/shift/forecast', [ShiftController::class, 'shiftForecast'])->name('shifts.forecast');
Route::get('shiftmanagement/shift/find', [ShiftController::class, 'shiftFind'])->name('shifts.find');
Route::get('shiftmanagement/shift/get', [ShiftController::class, 'search'])->name('shifts.get');
Route::get('shiftmanagement/shift/position', [ShiftController::class, 'searchPosition']) -> name('shifts.positionSearch');
Route::post('shiftmanagement/shift', [ShiftController::class, 'store']) -> name('shifts.store');
Route::get('shiftmanagement/shift/', [ShiftController::class, 'forecast']) -> name('shifts.calcShift');
Route::get('shiftmanagement/shift/edit/{shift_id}', [ShiftController::class, 'shiftEdit'])->name('shifts.edit');
Route::post('shiftmanagement/shift/update', [ShiftController::class, 'update'])->name('shifts.update');
Route::get('shiftmanagement/shift/delete/{shift_id}', [ShiftController::class, 'shiftDelete'])->name('shifts.delete');
Route::post('shiftmanagement/shift/destroy/{shift_id}', [ShiftController::class, 'destroy'])->name('shifts.destroy');
Route::get('shiftmanagement/shift/positionEdit', [ShiftController::class, 'searchPositionEdit']) -> name('shifts.positionSearchEdit');

// position
Route::get('shiftmanagement/position/register', [PositionController::class, 'positionRegister']) -> name('positions.register');
Route::get('shiftmanagement/position/index', [PositionController::class, 'positionIndex']) -> name('positions.index');
Route::get('shiftmanagement/position/find', [PositionController::class, 'positionFind']) -> name('positions.find');
Route::post('shiftmanagement/position', [PositionController::class, 'store']) -> name('positions.store');
Route::get('shiftmanagement/position/edit/{position_id}', [PositionController::class, 'positionEdit'])->name('positions.edit');
Route::post('shiftmanagement/position/update', [PositionController::class, 'update'])->name('positions.update');
Route::get('shiftmanagement/position/delete/{position_id}', [PositionController::class, 'positionDelete'])->name('positions.delete');
Route::post('shiftmanagement/position/destroy/{position_id}', [PositionController::class, 'destroy'])->name('positions.destroy');

// present.history
Route::get('presentmanagement/history/register', [HistoryController::class, 'historyRegister']) -> name('present.history.register');
Route::get('presentmanagement/history/index', [HistoryController::class, 'historyIndex']) -> name('present.history.index');
Route::get('presentmanagement/history/find', [HistoryController::class, 'historyFind']) -> name('present.history.find');
Route::get('presentmanagement/history/get', [HistoryController::class, 'search'])->name('present.history.get');
Route::post('presentmanagement/history/', [HistoryController::class, 'store']) -> name('present.history.store');
Route::get('presentmanagement/history/edit/{present_id}', [HistoryController::class, 'historyEdit'])->name('present.history.edit');
Route::post('presentmanagement/history/update', [HistoryController::class, 'update'])->name('present.history.update');
Route::get('presentmanagement/history/delete/{present_id}', [HistoryController::class, 'historyDelete'])->name('present.history.delete');
Route::post('presentmanagement/history/destroy/{present_id}', [HistoryController::class, 'destroy'])->name('present.history.destroy');


// present.candidate
Route::get('presentmanagement/candidate/register', [CandidateController::class, 'candidateRegister']) -> name('present.candidate.register');
Route::get('presentmanagement/candidate/index', [CandidateController::class, 'candidateIndex']) -> name('present.candidate.index');
Route::get('presentmanagement/candidate/find', [CandidateController::class, 'candidateFind']) -> name('present.candidate.find');
Route::post('presentmanagement/candidate/', [CandidateController::class, 'store']) -> name('present.candidate.store');
Route::get('presentmanagement/candidate/edit/{candidate_id}', [CandidateController::class, 'historyEdit'])->name('present.candidate.edit');
Route::post('presentmanagement/candidate/update', [CandidateController::class, 'update'])->name('present.candidate.update');
Route::get('presentmanagement/candidate/delete/{candidate_id}', [CandidateController::class, 'candidateDelete'])->name('present.candidate.delete');
Route::post('presentmanagement/candidate/destroy/{candidate_id}', [CandidateController::class, 'destroy'])->name('present.candidate.destroy');


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\BoardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Models\Board;

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

/*
* 게시판 글쓰기 화면으로 가는 route 입니다
Route::get('/boards/create', function () {
    return view('boards/create');

*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(BoardController::class)->group(function () {
    Route::get('boards/create', 'create')->name('boards.create');
    Route::post('boards', 'store')->name('boards.store');
    Route::get('boards/list', 'index')->name('boards.list');
    Route::get('boards/{board}/detail', 'show')->name('boards.detail');
    Route::put('boards/{board}/update', 'update')->name('boards.update');
    Route::delete('boards/{board}', 'destroy')->name('boards.delete');
    Route::get('boards/excel','excel')->name('boards.excel');
    Route::get('boards/{board}/createPDF','createPDF')->name('boards.createPDF');
});


Route::get('uploads/view',[UploadController::class,'uploadForm'])->name('uploads.view');
Route::post('uploads/view',[UploadController::class,'uploadFile'])->name('uploads.uploadFile');
Route::get('uploads/list',[UploadController::class,'index'])->name('uploads.list');
Route::get('uploads/{upload}/detail',[UploadController::class,'show'])->name('uploads.detail');
Route::get('uploads/{upload}/download',[UploadController::class,'download'])->name('uploads.download');


Route::get('/examples/column_align', function () {
    return view('examples/column_align');
})->name('examples.column_align');


Route::get('/examples/index', function () {
    return view('examples/index');
})->name('examples.index');

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/kegiatan', [KegiatanController::class,"tapilKegiatan"]);
    
Route::get('/program', function () {
    return view('program');
});

Route::get('/about', function () {
    return view('kegiatan');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/program', function () {
    return view('program',[
    "kategori" => \App\Models\Kategori::all(),
    "berita" => \App\Models\Berita::all()
    ]);
});

Route::get('/detail/{berita_id}', function ($berita_id) {
    return view('berita.detail',[
       "berita"=> \App\Models\Berita::find($berita_id)
    ]);
})->name("detai.berita");

Route::redirect('/','/welcome',301);

Route::middleware(['auth'])->group(function(){
    Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class,"tampilKegiatan"]);
    Route::post('/create',[App\Http\Controllers\KegiatanController::class,"create"]);
    Route::get('/delete/{id}',[App\Http\Controllers\KegiatanController::class,"delete"]);
    Route::get('/edit/{id}',[App\Http\Controllers\KegiatanController::class,"edit"]);
    Route::post('/update/{id}',[App\Http\Controllers\KegiatanController::class,"update"]);
    Route::get('/action/{id}',[App\Http\Controllers\KegiatanController::class,"action"]);
    Route::get('/program', [App\Http\Controllers\BeritaController::class,"tampilberita"]);
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





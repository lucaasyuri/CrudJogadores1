<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimesController;
use App\Http\Controllers\JogadoresController;

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
})->name('welcome');

//home
Route::get('/home', [App\Controllers\HomeController::class, 'index'])->name('home');

//grupo de times
Route::prefix('times')->group(function(){
    Route::get('', [TimesController::class, 'index'])->name('times-index');
    Route::get('/create', [TimesController::class, 'create'])->name('times-create');
    Route::post('/store', [TimesController::class, 'store'])->name('times-store');
    Route::get('/{id}/edit', [TimesController::class, 'edit'])->where('id', '[0-9]+')->name('times-edit');
    Route::put('/{id}/update', [TimesController::class, 'update'])->where('id', '[0-9]+')->name('times-update');
    Route::delete('/{id}', [TimesController::class, 'destroy'])->where('id', '[0-9]+')->name('times-destroy');
});

//grupo de jogadores
Route::prefix('jogadores')->group(function(){
    Route::get('', [JogadoresController::class, 'index'])->name('jogadores-index');
    Route::get('/create', [JogadoresController::class, 'create'])->name('jogadores-create');
    Route::post('/store', [JogadoresController::class, 'store'])->name('jogadores-store');
    Route::get('/{id}/edit', [JogadoresController::class, 'edit'])->where('id', '[0-9]+')->name('jogadores-edit');
    Route::put('/{id}/update', [JogadoresController::class, 'update'])->where('id', '[0-9]+')->name('jogadores-update');
    Route::delete('/{id}', [JogadoresController::class, 'destroy'])->where('id', '[0-9]+')->name('jogadores-destroy');
});

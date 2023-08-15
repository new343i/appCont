<?php

use App\Http\Controllers\EstResult;
use App\Http\Controllers\newBalanza;
use App\Http\Controllers\newConcepcontrol;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newBalanceControl;

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
Route::get('/', function () {
    return view('Inicio');
});*/

Route::get('/', [newBalanceControl::class, 'create'])->name('Balance');
Route::post('/save', [newBalanceControl::class, 'store'])->name('Balance.store');
Route::get('/Balances', [newBalanceControl::class, 'index'])->name('Balance.index');
Route::get('/Balances/editBalance/{id}/edit', [newBalanceControl::class, 'edit'])->name('Balance.edit');
Route::put('/Balances/editBalance/{id}/update', [newBalanceControl::class, 'update'])->name('Balance.update');
Route::delete('/Balances/{id}/destroy', [newBalanceControl::class, 'destroy'])->name('Balance.destroy');

Route::get('/Balances/newConcep/{id}/add', [newBalanceControl::class, 'show'])->name('Balance.add');
Route::post('/Balances/newConcep/{id}/save', [newConcepcontrol::class, 'store'])->name('Concepto.store');
Route::get('/Balances/BalanceGen/{id}/index', [newConcepcontrol::class, 'index'])->name('BalanceGen.index');
Route::get('/Balances/BalanceGen/{idbal}/editConcep/{id}/edit', [newConcepcontrol::class, 'edit'])->name('Concepto.edit');
Route::put('/Balances/BalanceGen/editConcep/{id}/update', [newConcepcontrol::class, 'update1'])->name('Concepto.update1');
Route::put('/Balances/BalanceGen/{id}/update', [newConcepcontrol::class, 'update'])->name('Concepto.update');
Route::get('/Balances/Balanza/{id}/index', [newBalanza::class, 'index'])->name('Balanza.index');

Route::get('/Balances/EstResults/{id}/index', [EstResult::class, 'index'])->name('estResult.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\ClienteController;
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
    return view('principal');
});

Route::middleware(['auth'])->group(function () {

});


Route::get('/clientes',[ClienteController::class,'index'])->name('clientes');
Route::get('/cliente/show',[ClienteController::class,'show'])->name('cliente-show');
Route::get('/cliente/create',[ClienteController::class,'create'])->name('cliente-create');
Route::post('/cliente/save',[ClienteController::class,'store'])->name('cliente-save');
Route::put('/cliente/update',[ClienteController::class,'update'])->name('cliente-update');
Route::delete('/cliente/destroy',[ClienteController::class,'destroy'])->name('cliente-destroy');
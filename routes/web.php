<?php

use App\Http\Controllers\BaseController;
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

Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/edit/{id?}', [BaseController::class, 'edit'])->name('user.edit');
Route::get('user/create', [BaseController::class, 'create'])->name('user.create');
Route::post('/users', [BaseController::class, 'store'])->name('user.store');
Route::post('/users/{id?}', [BaseController::class, 'update'])->name('user.update');
Route::get('/users/{id?}', [BaseController::class, 'destroy'])->name('user.delete');

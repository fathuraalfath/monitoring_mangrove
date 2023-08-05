<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\MangroveController;
use App\Http\Controllers\UserController;
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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::view('/admin', 'admin.dataMangrove.v_index',[

// ]);
Route::get('/admin', [MangroveController::class, 'index'])->name('admin.index');
Route::get('/admin/add', [MangroveController::class, 'add'])->name('admin.add');
Route::get('/admin/detail/{id}', [MangroveController::class, 'detail'])->name('admin.detail');
Route::post('/admin/insert', [MangroveController::class, 'insert'])->name('admin.insert');
Route::get('/admin/edit/{id}', [MangroveController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [MangroveController::class, 'update'])->name('admin.update');
Route::get('/admin/delete/{id}', [MangroveController::class, 'delete'])->name('admin.delete');

Route::get('/admin/print', [MangroveController::class, 'print'])->name('admin.print');

Route::view('/panduan', 'admin.dataMangrove.v_panduan');

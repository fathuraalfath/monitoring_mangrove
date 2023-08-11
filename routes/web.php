<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\MangroveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanduanController;
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


//panduan penggunaan user
Route::get('/panduan', [PanduanController::class, 'panduan'])->name('panduan');

//user management

//hak akses admin
Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [MangroveController::class, 'index'])->name('admin.index');
    Route::get('/admin/add', [MangroveController::class, 'add'])->name('admin.add');
    Route::get('/admin/detail/{id}', [MangroveController::class, 'detail'])->name('admin.detail');
    Route::post('/admin/insert', [MangroveController::class, 'insert'])->name('admin.insert');
    Route::get('/admin/edit/{id}', [MangroveController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [MangroveController::class, 'update'])->name('admin.update');
    Route::get('/admin/delete/{id}', [MangroveController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/print', [MangroveController::class, 'print'])->name('admin.print');
    Route::get('/admin/download/{file_shp}', [MangroveController::class, 'download'])->name('admin.download');
});

Route::group(['middleware' => 'user'], function(){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/print', [UserController::class, 'print'])->name('user.print');
    Route::get('/user/download/{file_shp}', [MangroveController::class, 'download'])->name('user.download');
});


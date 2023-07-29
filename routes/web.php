<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Category\CategoryController;

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

Route::get('admin/login',[AdminController::class,'index'])->name('admin-login');
Route::get('dashboard',[SuperAdminController::class,'dashboard'])->name('dashboard');
Route::post('admin/dashboard',[AdminController::class,'showDashboard'])->name('admin-dashboard');
Route::get('logout',[SuperAdminController::class,'logout'])->name('logout');


Route::resource('categories',CategoryController::class);
Route::get('catStatusUpdate/{category}',[CategoryController::class,'statusChange'])->name('catStatusUpdate');

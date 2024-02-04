<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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
//



Route::middleware(['web'])->group(function (){

Route::redirect('/', '/tasks');

Auth::routes();});


Route::middleware(['web', 'auth'])->group(function () {
Route::resource('tasks', TaskController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class);
Route::get('/categories/{category}/confirm-delete', [CategoryController::class, 'confirmDelete'])->name('categories.confirm-delete');
});
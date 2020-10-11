<?php

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\WelcomeController;
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
Route::get('', [WelcomeController::class, 'index'])->name('index');
Route::group([
    'prefix' => 'groups/',
],  function(){
    Route::get('', [GroupsController::class,'index'])->name('groups.index');
    Route::get('create', [GroupsController::class,'create'])->name('groups.create');
    Route::get('{id}', [GroupsController::class,'view'])->name('groups.view');
    Route::post('create', [GroupsController::class,'store'])->name('groups.store');
    Route::get('edit/{id}', [GroupsController::class,'edit'])->name('groups.edit');
    Route::post('edit/{id}', [GroupsController::class,'update'])->name('groups.update');
    Route::delete('delete/{id}', [GroupsController::class,'delete'])->name('groups.delete');
});

Route::group([
    'prefix' => 'students/',
],  function(){
    Route::get('', [StudentsController::class,'index'])->name('students.index');
    Route::get('create', [StudentsController::class,'create'])->name('students.create');
    Route::post('create', [StudentsController::class,'store'])->name('students.store');
    Route::get('edit/{id}', [StudentsController::class,'edit'])->name('students.edit');
    Route::post('edit/{id}', [StudentsController::class,'update'])->name('students.update');
    Route::delete('delete/{id}', [StudentsController::class,'delete'])->name('students.delete');
});

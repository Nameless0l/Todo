<?php

use App\Http\Controllers\TodosController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::any('/', [TodosController::class, 'liste'])->name('todo.list');
Route::any('/action/add', [TodosController::class, 'saveTodo'])->name('todo.add');
Route::any('action/done/{id}', [TodosController::class, 'makeAsdone'])->name('todo.done');
Route::any('action/delete/{id}', [TodosController::class, 'deleteTodo'])->name('todo.delete');


// Route::get("/",function(){return view('home');});

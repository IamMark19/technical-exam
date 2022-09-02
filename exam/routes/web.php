<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;

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
});

Route::get('/todos', [TodoController::class,'index'])->name('todo');
Route::post('/todo/store', [TodoController::class,'store'])->name('todo.create');
Route::get('/todo/{id}/done', [TodoController::class,'done'])->name('todo.done');
Route::get('/todo/{id}/edit', [TodoController::class,'edit'])->name('todo.edit');
Route::patch('/todo/{id}/update', [TodoController::class,'update'])->name('todo.update');
Route::get('/todo/{id}/delete', [TodoController::class,'delete'])->name('todo.delete');

Route::get('/notes', [NoteController::class,'index'])->name('note');
Route::post('/note/store', [NoteController::class,'store'])->name('note.create');
Route::get('/note/{id}/edit', [NoteController::class,'edit'])->name('note.edit');
Route::patch('/note/{id}/update', [NoteController::class,'update'])->name('note.update');
Route::get('/note/{id}/delete', [NoteController::class,'delete'])->name('note.delete');

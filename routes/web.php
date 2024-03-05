<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/todos', [TodoController::class, 'index']);

Route::post('/todos/store', [TodoController::class, 'store']);

Route::get('/todos/edit/{id}', [TodoController::class, 'edit']);

Route::PATCH('/todos/update/{id}', [TodoController::class, 'update']);

Route::DELETE('/todos/delete/{id}', [TodoController::class, 'destroy']);





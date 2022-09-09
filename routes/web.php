<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\EmployeesController;
use app\Http\Controllers\ProjectsController;

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
    return view('inicio');
});

Route::get('/employees', 'app\Http\Controllers\EmployeesController@index');
//Route::get('/projects', [ProjectsController::class, 'index']);


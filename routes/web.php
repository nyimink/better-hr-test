<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [UserController::class, 'loginPage']);

Route::get('register', [UserController::class, 'registerPage']);
Route::post('register', [UserController::class, 'register']);

Route::get('login', [UserController::class, 'loginPage']);
Route::post('login', [UserController::class, 'login']);

Route::post('logout', [UserController::class, 'logout'])->name('logout');

//Employee
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/add', [EmployeeController::class, 'add']);
Route::post('/employees/add', [EmployeeController::class, 'create']);

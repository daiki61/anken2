<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;


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

//Route::middleware('auth')->group(function () {
     //Route::get('/', [AuthController::class, 'index']);
 //});
 Route::post('/clock-in', [AttendanceController::class, 'clockIn'])
    ->middleware('auth') 
    ->name('clock-in');

Route::get('/', [AttendanceController::class, 'index']); 


Route::post('/create', [RegisteredUserController::class, 'create']);
Route::post('/store', [RegisteredUserController::class, 'store']);
Route::put('/update/{id}', [RegisteredUserController::class, 'update']);

Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm']);
Route::post('/register', [RegisteredUserController::class, 'register']);
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::get('/login', [AuthenticatedSessionController::class, 'showLoginForm']);
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout']);

Route::get('/members/store', [AuthenticatedSessionController::class, 'store']);
Route::post('/members/create', [AuthenticatedSessionController::class, 'create']);
Route::post('/members/update/{id}', [AuthenticatedSessionController::class, 'update']);


Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

Route::get('/clock-in', [AttendanceController::class, 'clockIn'])->name('clock-in');
Route::post('/clock-in', [AttendanceController::class, 'clockIn'])->name('clock-in');
Route::post('/clock-out', [AttendanceController::class, 'clockOut'])->name('clock-out');
Route::post('/rest-in', [AttendanceController::class, 'restIn'])->name('rest-in');
Route::post('/rest-out', [AttendanceController::class, 'restOut'])->name('rest-out');

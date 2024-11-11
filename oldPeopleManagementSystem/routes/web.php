<?php

use App\Http\Controllers\LoginPageController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [LoginPageController::class, 'home']);
Route::get('/register', [LoginPageController::class, 'register']);
Route::post('/register-user', [LoginPageController::class, 'registerUser'])->name('register-user'); 
Route::get('/login', [LoginPageController::class, 'login']);
Route::post('/login-user', [LoginPageController::class, 'loginUser'])->name('login-user'); 
Route::get('/admin', [LoginPageController::class, 'admin']);
Route::get('/profile', [LoginPageController::class, 'profile']);
Route::get('/dashboard',[LoginPageController::class, 'dashboard']);
Route::get('/logout',[LoginPageController::class,'logout']);
<?php


use App\Http\Controllers\LoginPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Public routes
Route::get('/home', [LoginPageController::class, 'home']);
Route::get('/register', [LoginPageController::class, 'register']);
Route::post('/register-user', [LoginPageController::class, 'registerUser'])->name('register-user');
Route::get('/login', [LoginPageController::class, 'login'])->name('login');
Route::post('/login-user', [LoginPageController::class, 'loginUser'])->name('login-user');

    Route::get('/dashboard', [LoginPageController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin', [LoginPageController::class, 'admin'])->name('admin');
    Route::get('/logout', [LoginPageController::class, 'logout'])->name('logout');
?>

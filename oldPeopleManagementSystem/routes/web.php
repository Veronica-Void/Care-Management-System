<?php


use App\Http\Controllers\LoginPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AppointmentController;

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
Route::get('/logout', [LoginPageController::class, 'logout'])->name('logout');

Route::get('/make/appointment', [AppointmentController::class, 'appointment'])->name('appointments');
Route::post('/make/appointment', [AppointmentController::class, 'getPatient'])->name('find_patient');
Route::post('/make/appointment/create', [AppointmentController::class, 'makeAppointment'])->name('makeAppointment');

// Admin routes
Route::get('/admin', [LoginPageController::class, 'admin'])->name('admin');
Route::get('approval', [LoginPageController::class, 'approval'])->name('approval');
Route::get('approve/{id}', [LoginPageController::class, 'approveUser'])->name('approveUser');
Route::get('deny/{id}', [LoginPageController::class, 'denyUser'])->name('denyUser');
Route::get('/admin/role', [AdminPageController::class, 'role'])->name('admin-role');
Route::post('/admin/role', [AdminPageController::class, 'makeRole'])->name('change-role');

?>

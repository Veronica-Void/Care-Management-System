<?php


use App\Http\Controllers\LoginPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdditionalPatientInfoController;
use App\Http\Controllers\PatientInfoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorHomeController;

Route::get('/', function () {
    return view('welcome');
});

// Public routes
Route::get('/home', [LoginPageController::class, 'home']);
Route::get('/register', [LoginPageController::class, 'register']);
Route::post('/register-user', [LoginPageController::class, 'registerUser'])->name('register-user');
Route::post('/register', [LoginPageController::class, 'registerUser'])->name('register-user');
Route::get('/login', [LoginPageController::class, 'login'])->name('login');
Route::post('/login-user', [LoginPageController::class, 'loginUser'])->name('login-user');
Route::get('/patients',[LoginPageController::class,'patients'])->name('patients');
Route::get('/dashboard', [LoginPageController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [LoginPageController::class, 'logout'])->name('logout');
Route::get('/viewRoster', [LoginPageController::class, 'viewRoster'])->name('roster.view');
Route::get('patientHome', [PatientInfoController::class, 'patientHome'])->name('patientHome');
// Admin routes
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [LoginPageController::class, 'admin'])->name('admin');
    Route::get('admin/approval', [LoginPageController::class, 'approval'])->name('approval');
    Route::get('approve/{id}', [LoginPageController::class, 'approveUser'])->name('approveUser');
    Route::get('deny/{id}', [LoginPageController::class, 'denyUser'])->name('denyUser');
    Route::get('/admin/role', [AdminPageController::class, 'role'])->name('admin-role');
    Route::post('/admin/role', [AdminPageController::class, 'makeRole'])->name('change-role');
});

Route::post('/update-salary', [LoginPageController::class, 'updateSalary'])->name('update.salary');
Route::post('newRoster',[LoginPageController::class,'newRoster'])->name('newRoster');
Route::get('/create-roster', [LoginPageController::class, 'newRoster'])->name('roster.create');
Route::post('/store-roster', [LoginPageController::class, 'createRoster'])->name('roster.store');
Route::get('newRoster',[LoginPageController::class,'newRoster'])->name('newRoster');
Route::get('/make/appointment', [AppointmentController::class, 'appointment'])->name('appointments');
Route::post('/make/appointment', [AppointmentController::class, 'getPatient'])->name('find_patient');
Route::post('/make/appointment/create', [AppointmentController::class, 'makeAppointment'])->name('makeAppointment');
Route::get('/employees',[LoginPageController::class, 'employees'])->name('employees');
Route::post('/employees',[LoginPageController::class, 'searchForTerm'])->name('search');
Route::get('/additionalPatientInfo', [AdditionalPatientInfoController::class, 'patientInfo'])->name('patientInfo');
Route::post('/additionalPatientInfo/store', [AdditionalPatientInfoController::class, 'store'])->name('additional-patient-info.store');
// Route::post('/additionalPatientInfo', [AdditionalPatientInfoController::class, 'patientInfo'])->name('patientInfo');
Route::post('/additional-patient-info', [AdditionalPatientInfoController::class, 'store'])->name('additional-patient-info');

//Payment routes - Can only be accessed by admin
Route::get('/payment', [PaymentController::class, 'viewPaymentPage'])->name('viewPaymentPage');
Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');



// Also for Supervisor
Route::get('/adminReport', [LoginPageController::class, 'missedActivityReport'])->name('missedActivityReport');
Route::get('/make/appointment', [AppointmentController::class, 'appointment'])->name('appointments');
Route::post('/make/appointment', [AppointmentController::class, 'getPatient'])->name('find_patient');
Route::post('/make/appointment/create', [AppointmentController::class, 'makeAppointment'])->name('makeAppointment');
Route::get('/admin/approval', [LoginPageController::class, 'approval'])->name('approval');
Route::post('newRoster',[LoginPageController::class,'newRoster'])->name('newRoster');
Route::get('/create-roster', [LoginPageController::class, 'newRoster'])->name('roster.create');
Route::post('/store-roster', [LoginPageController::class, 'createRoster'])->name('roster.store');
Route::get('newRoster',[LoginPageController::class,'newRoster'])->name('newRoster');
Route::get('approve/{id}', [LoginPageController::class, 'approveUser'])->name('approveUser');
Route::get('deny/{id}', [LoginPageController::class, 'denyUser'])->name('denyUser');

//Caregiver Routes
Route::get('/caregiver', [PatientInfoController::class, 'caregiver'])->name('caregiver');
Route::post('/caregiver/storePatientInfo', [PatientInfoController::class, 'storePatientInfo'])->name('storePatientInfo');
Route::post('/caregiver/selectPatient', [PatientInfoController::class, 'selectPatient'])->name('selectPatient');

Route::post('/editMeds', [PatientInfoController::class, 'editMeds'])->name('check');
Route::post('/caregiver/search', [PatientInfoController::class, 'searchPatient'])->name('getPatient');

//Doctor Routes
Route::get('/doctor', [DoctorHomeController::class, 'home'])->name('doctor');
Route::post('/doctor/patient', [DoctorHomeController::class, 'searchPatient'])->name('searchPatient');
Route::post('/doctor', [DoctorHomeController::class, 'newPerscription'])->name('newPerscription');

Route::get('/familyHome', [LoginPageController::class, 'familyHome'])->name('familyHome');

?>
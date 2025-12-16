<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\TaskController;
use App\Http\Controllers\Admin\DailyWorkReportController;
use App\Http\Controllers\Employee\Daily_Work_ReportController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\EmployeeAuth;
use App\Http\Middleware\AdminAuth;

Route::get('/', function () {
    return view('welcome');
});
// EMPLOYEE AUTH ROUTES

// Register
Route::get('/employee/register', [EmployeeController::class, 'create'])->name('employee.register');
Route::post('/employee/register', [EmployeeController::class, 'register'])->name('employee.register.submit');

// Login
Route::get('/employee/login', [EmployeeController::class, 'loginForm'])->name('employee.login');

Route::post('/employee/login', [EmployeeController::class, 'login'])->name('employee.login.submit');

Route::get('/login', function () {
    return redirect()->route('employee.login');
})->name('login');

//Logout
Route::post('/employee/logout', function () {
    Auth::guard('employee')->logout();
    return redirect()->route('employee.login');
})->name('employee.logout');

// Dashboard 
Route::middleware(['auth:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
});

// DAILY WORK 
Route::middleware(['auth:employee'])->group(function () {

    Route::get('/employee/daily_work', 
        [Daily_Work_ReportController::class, 'create']
    )->name('employee.daily_work');

    Route::post('/employee/daily_work/store', 
        [Daily_Work_ReportController::class, 'store']
    )->name('employee.daily_work.store');

});

// EMPLOYEE TASK ROUTES
Route::middleware(['auth:employee'])->group(function () {

    Route::get('/employee/profile', [EmployeeController::class, 'profile'])->name('employee.profile');
    Route::post('/employee/profile/update', [EmployeeController::class, 'profileUpdate'])->name('employee.profile.update');

    Route::get('/employee/tasks', [TaskController::class, 'index'])->name('employee.tasks');
    Route::post('/employee/task/update/{id}', [TaskController::class, 'updateTask'])->name('employee.task.update');

    Route::get('/employee/pending-tasks', [EmployeeController::class, 'pendingTasks'])->name('employee.pendingTasks');
    Route::get('/employee/completed-tasks', [EmployeeController::class, 'completedTasks'])->name('employee.completedTasks');
    Route::get('/employee/today-tasks', [EmployeeController::class, 'todayTasks'])->name('employee.todayTasks');
});

// ADMIN AUTH ROUTES

Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// ADMIN PROTECTED ROUTES
Route::middleware([AdminAuth::class])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/tasks_assign', [AdminController::class, 'tasks_assign'])
    ->name('admin.tasks_assign');
    Route::get('/admin/tasks_overview', [AdminController::class, 'tasks_overview'])->name('admin.tasks_overview');

    Route::get('/admin/employee', [AdminController::class, 'employee'])->name('admin.employee');
    Route::get('/admin/employees/{id}', [AdminController::class, 'showEmployee'])->name('admin.employees.show');
    Route::get('/admin/employee/profile/{id}', [AdminController::class, 'viewEmployeeProfile'])->name('admin.employee.profile');
    Route::delete('/admin/employee/delete/{id}', [AdminController::class, 'deleteEmployee'])->name('admin.employee.delete');

    Route::post('/admin/tasks/store', [AdminController::class, 'store'])->name('admin.task.store');
    Route::get('/admin/task/edit/{id}', [AdminController::class, 'editTask'])->name('admin.editTask');
    Route::put('/admin/task/update/{id}', [AdminController::class, 'updateTask'])->name('admin.updateTask');
    Route::put('/admin/task-status/{id}', [AdminController::class, 'updateTaskStatus'])->name('admin.updateTaskStatus');

    Route::get('/admin/daily_work_report', [DailyWorkReportController::class, 'index'])->name('admin.daily_work_report');
});

// Admin Register
Route::get('/admin/register', [AdminController::class, 'registerForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

// Admin add employee
Route::get('/admin/employee/create', [AdminController::class, 'createEmployee'])->name('admin.employee.create');
Route::post('/admin/employee/store', [AdminController::class, 'storeEmployee'])->name('admin.employee.store');

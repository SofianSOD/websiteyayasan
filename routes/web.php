<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\AdmissionManagementController as AdminAdmission;
use App\Http\Controllers\Admin\PostManagementController as AdminPost;
use App\Http\Controllers\Admin\ProgramManagementController as AdminProgram;
use App\Http\Controllers\Admin\ReportController as AdminReport;
use App\Http\Controllers\Admin\SettingController as AdminSetting;
use App\Http\Controllers\Admin\GalleryManagementController;
use App\Http\Controllers\Admin\SliderManagementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/programs', [HomeController::class, 'programs'])->name('programs');
Route::get('/programs/{slug}', [HomeController::class, 'showProgram'])->name('programs.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// News/Berita Routes
Route::get('/news', [PostController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [PostController::class, 'show'])->name('news.show');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {

    // Student Dashboard & Enrollment (Default role: student)
    Route::get('/portal', [AdmissionController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/portal/programs', [AdmissionController::class, 'programs'])->name('student.programs');
    Route::get('/portal/announcements', [AdmissionController::class, 'announcements'])->name('student.announcements');
    Route::get('/portal/schedule', [AdmissionController::class, 'schedule'])->name('student.schedule');
    Route::get('/portal/profile', [AdmissionController::class, 'profile'])->name('student.profile');
    Route::post('/portal/profile', [AdmissionController::class, 'updateProfile'])->name('student.profile.update');

    Route::get('/enroll', [AdmissionController::class, 'showRegistrationForm'])->name('admission.register');
    Route::post('/enroll', [AdmissionController::class, 'submitRegistration'])->name('admission.submit');

    // Admin Routes (Role protected)
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/admissions', [AdminAdmission::class, 'index'])->name('admissions.index');
        Route::patch('/admissions/{id}', [AdminAdmission::class, 'updateStatus'])->name('admissions.update');

        // News Management
        Route::resource('posts', AdminPost::class);

        // Program Management
        Route::resource('programs', AdminProgram::class);

        // Gallery Management
        Route::resource('galleries', GalleryManagementController::class);

        // Slider Management
        Route::resource('sliders', SliderManagementController::class);

        // Reports
        Route::get('/reports', [AdminReport::class, 'index'])->name('reports.index');
        Route::get('/reports/rekap', [AdminReport::class, 'rekap'])->name('reports.rekap');
        Route::get('/reports/export-csv', [AdminReport::class, 'exportCSV'])->name('reports.export.csv');

        // Settings
        Route::get('/settings', [AdminSetting::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSetting::class, 'update'])->name('settings.update');
    });
});

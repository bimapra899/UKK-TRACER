<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\UserPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminKuesionerController;
use App\Http\Controllers\BidangKeahlianController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\KonsentrasiKeahlianController;
use App\Http\Controllers\TahunLulusController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAlumniController;
use App\Http\Controllers\AdminTracerController;
use App\Http\Controllers\AdminTestimoniController;


Route::get('/', [HomeController::class, 'index']);

// Normal Users Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profileUser.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [UserProfileController::class, 'store'])->name('user.profile.store');
    
    // Update password route
    Route::post('/user/password', [UserPasswordController::class, 'update'])
        ->name('user.password.update');

        Route::get('/alumni/register', [AlumniController::class, 'create'])->name('alumni.register');
        Route::post('/alumni/store', [AlumniController::class, 'store'])->name('alumni.store');

    Route::get('/kuesioner', [KuesionerController::class, 'create'])->name('kuesioner.create');
    Route::post('/kuesioner', [KuesionerController::class, 'store'])->name('kuesioner.store');
});

// Admin Routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/kuesioner', [AdminKuesionerController::class, 'index'])->name('admin.kuesioner');
    Route::post('/admin/kuesioner', [AdminKuesionerController::class, 'submit'])->name('admin.kuesioner.submit');
    Route::get('/admin/users/add', [AdminUserController::class, 'create'])->name('admin.users.add'); // Tambahkan GET route
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');

    // bidang keahlian 
    Route::get('/admin/bidang_keahlian', [BidangKeahlianController::class, 'index'])->name('admin.bidang_keahlian.index');
    Route::get('/admin/bidang_keahlian/create', [BidangKeahlianController::class, 'create'])->name('admin.bidang_keahlian.create');
    Route::post('/admin/bidang_keahlian', [BidangKeahlianController::class, 'store'])->name('admin.bidang_keahlian.store');
    Route::get('admin/bidang_keahlian/edit/{bidangKeahlian}', [BidangKeahlianController::class, 'edit'])->name('admin.bidang_keahlian.edit');
    Route::put('admin/bidang_keahlian/update/{bidangKeahlian}', [BidangKeahlianController::class, 'update'])->name('admin.bidang_keahlian.update');
    Route::delete('/admin/bidang_keahlian/delete/{bidangKeahlian}', [BidangKeahlianController::class, 'destroy'])->name('admin.bidang_keahlian.destroy');


    //program keahlian
    Route::get('/program_keahlian', [ProgramKeahlianController::class, 'index'])->name('admin.program_keahlian.index');
    // Tambah Program Keahlian
    Route::get('/admin/program_keahlian/create', [ProgramKeahlianController::class, 'create'])->name('admin.program_keahlian.create');
    Route::post('/program_keahlian', [ProgramKeahlianController::class, 'store'])->name('admin.program_keahlian.store');
    // Edit Program Keahlian
    Route::get('/admin//program_keahlian/edit/{bidangKeahlian}', [ProgramKeahlianController::class, 'edit'])->name('admin.program_keahlian.edit');
    Route::put('/admin//program_keahlian/update/{bidangKeahlian}', [ProgramKeahlianController::class, 'update'])->name('admin.program_keahlian.update');
    // Hapus Program Keahlian
    Route::delete('/admin//program_keahlian/delete/{bidangKeahlian}', [ProgramKeahlianController::class, 'destroy'])->name('admin.program_keahlian.delete');


    //konsentrasi keahlian
    Route::get('/konsentrasi-keahlian', [KonsentrasiKeahlianController::class, 'index'])
    ->name('admin.konsentrasi_keahlian.index');
     Route::get('/konsentrasi_keahlian/create', [KonsentrasiKeahlianController::class, 'create'])->name('admin.konsentrasi_keahlian.create');
    Route::post('/konsentrasi_keahlian/store', [KonsentrasiKeahlianController::class, 'store'])->name('admin.konsentrasi_keahlian.store');
    Route::get('/konsentrasi_keahlian/edit/{id}', [KonsentrasiKeahlianController::class, 'edit'])->name('admin.konsentrasi_keahlian.edit');
    Route::put('/konsentrasi_keahlian/update/{id}', [KonsentrasiKeahlianController::class, 'update'])->name('admin.konsentrasi_keahlian.update');
    Route::delete('/konsentrasi_keahlian/delete/{id}', [KonsentrasiKeahlianController::class, 'destroy'])->name('admin.konsentrasi_keahlian.delete');

    //tahun lulus
    Route::resource('admin/tahun_lulus', TahunLulusController::class, [
        'as' => 'admin'
    ]);

    // Sekolah Routes
    Route::get('/admin/sekolah', [SekolahController::class, 'index'])->name('admin.sekolah.index');
    Route::get('/admin/sekolah/create', [SekolahController::class, 'create'])->name('admin.sekolah.create');
    Route::post('/admin/sekolah', [SekolahController::class, 'store'])->name('admin.sekolah.store');
    Route::get('/admin/sekolah/edit/{sekolah}', [SekolahController::class, 'edit'])->name('admin.sekolah.edit');
    Route::put('/admin/sekolah/{sekolah}', [SekolahController::class, 'update'])->name('admin.sekolah.update');
    Route::delete('/admin/sekolah/{sekolah}', [SekolahController::class, 'destroy'])->name('admin.sekolah.destroy');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Alumni Management
    Route::get('/alumni', [AdminAlumniController::class, 'index'])->name('admin.alumni.index');
    Route::get('/alumni/create', [AdminAlumniController::class, 'create'])->name('admin.alumni.create');
    Route::post('/alumni', [AdminAlumniController::class, 'store'])->name('admin.alumni.store');
    Route::get('/alumni/{alumni}/edit', [AdminAlumniController::class, 'edit'])->name('admin.alumni.edit');
    Route::put('/alumni/{alumni}', [AdminAlumniController::class, 'update'])->name('admin.alumni.update');
    Route::delete('/alumni/{alumni}', [AdminAlumniController::class, 'destroy'])->name('admin.alumni.destroy');

    // Tracer Management
    Route::get('/tracer/kerja', [AdminTracerController::class, 'kerja'])->name('admin.tracer.kerja');
    Route::get('/tracer/kuliah', [AdminTracerController::class, 'kuliah'])->name('admin.tracer.kuliah');

    // Testimonial Management
    Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni');
    Route::delete('/testimoni/{testimoni}', [AdminTestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');
});

// User Routes untuk melihat profil sekolah (di luar middleware)
Route::get('/sekolah/profile', [SekolahController::class, 'showProfile'])->name('sekolah.profile');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

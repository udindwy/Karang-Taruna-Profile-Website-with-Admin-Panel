<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LandingPageGalleryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NewsController;

// Controllers Admin dengan Alias
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\HeroSectionController as AdminHeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController as AdminAboutSectionController;

/*
|--------------------------------------------------------------------------
| Rute Halaman Publik
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('/contact', [AdminContactController::class, 'store'])->name('contact.store');

// Halaman Detail
Route::get('/program/{program}', [LandingPageController::class, 'showProgram'])->name('program.show');
Route::get('/berita/{news}', [NewsController::class, 'show'])->name('news.show');

// Halaman Arsip
Route::get('/galeri', [LandingPageGalleryController::class, 'index'])->name('galleries.index');
Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');


/*
|--------------------------------------------------------------------------
| Rute Area Admin & Pengguna
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Semua rute admin masuk ke grup ini
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/hero', [AdminHeroSectionController::class, 'edit'])->name('hero.edit');
        Route::put('/hero', [AdminHeroSectionController::class, 'update'])->name('hero.update');
        Route::get('/about', [AdminAboutSectionController::class, 'edit'])->name('about.edit');
        Route::put('/about', [AdminAboutSectionController::class, 'update'])->name('about.update');

        Route::resource('members', AdminMemberController::class);
        Route::resource('programs', AdminProgramController::class);
        Route::resource('galleries', AdminGalleryController::class);

        Route::resource('news', AdminNewsController::class);

        Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
        Route::get('settings', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });

// Rute Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Otentikasi Bawaan
require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Dashboard\ContactController as DashboardContactController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\ProfileController as DashboardProfileController;
use App\Http\Controllers\Dashboard\WebsiteController as DashboardWebsiteController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

// dashboard routes
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard-home');

        Route::group(['prefix' => 'contato'], function () {
            Route::get('/', [DashboardContactController::class, 'index'])->name('dashboard-contact');
            Route::get('/visualizar/{id}', [DashboardContactController::class, 'edit'])->name('dashboard-contact-show');
            Route::get('/read', [DashboardContactController::class, 'read'])->name('dashboard-contact-read');
            Route::get('/unread', [DashboardContactController::class, 'unread'])->name('dashboard-contact-unread');
            Route::post('/store', [DashboardContactController::class, 'store'])->name('dashboard-contact-store');
            Route::get('cadastro', [DashboardContactController::class, 'create'])->name('dashboard-contact-create');
            Route::get('/label/{label}', [DashboardContactController::class, 'label'])->name('dashboard-contact-label');
            Route::get('/apagar/{id}', [DashboardContactController::class, 'destroy'])->name('dashboard-contact-delete');
        });

        Route::group(['prefix' => 'perfil'], function () {
            Route::get('/', [DashboardProfileController::class, 'edit'])->name('dashboard-profile-edit');
            Route::post('/update', [DashboardProfileController::class, 'update'])->name('dashboard-profile-update');
        });

        Route::group(['prefix' => 'website'], function () {
            Route::get('/', [DashboardWebsiteController::class, 'edit'])->name('dashboard-website');
        });
    });
});

// website routes
Route::get('/', [HomeController::class, 'index'])->name('home');


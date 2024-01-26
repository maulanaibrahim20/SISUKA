<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\WEB\Admin\User\AdminKecController;
use App\Http\Controllers\WEB\Admin\Wilayah\WilayahController;
use App\Http\Controllers\WEB\AdminKec\User\AdminDesController;
use App\Http\Controllers\WEB\Auth\LoginController;
use App\Http\Controllers\WEB\Auth\LogoutController;
use App\Http\Controllers\WEB\Auth\NewPasswordController;
use App\Http\Controllers\WEB\Auth\RegisterController;
use App\Http\Controllers\WEB\Auth\ResetPasswordController;
use App\Http\Controllers\WEB\Auth\VerificationController;
use App\Http\Controllers\WEB\DashboardController;
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

Route::middleware(['guest'])->group(function () {

    Route::get('/masuk', [AppController::class, 'index']);

    Route::prefix('login')->name('login.')->group(function () {
        Route::get('/', [LoginController::class, 'index'])
            ->name('index');
        Route::post('/', [LoginController::class, 'process'])
            ->name('process');
    });
    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])
            ->name('index');
        Route::post('/', [RegisterController::class, 'register'])
            ->name('process');
    });

    Route::prefix('reset-password')->name('reset-password.')->group(function () {
        Route::get('/', [ResetPasswordController::class, 'index'])
            ->name('index');
        Route::post('/', [ResetPasswordController::class, 'process'])
            ->name('process');
    });

    Route::prefix('new-password')->name('new-password.')->group(function () {
        Route::get('/', [NewPasswordController::class, 'index'])
            ->name('index');
        Route::post('/', [NewPasswordController::class, 'process'])
            ->name('process');
    });

    Route::get('verification', VerificationController::class)
        ->name('verification');
});

Route::middleware(['auth'])->name('web.')->group(function () {
    Route::get('/logout', LogoutController::class)
        ->name('auth.logout');
});

Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => ['can:admin_kab']], function () {
        Route::prefix('admin/kab')->group(function () {
            Route::prefix('wilayah')->group(function () {
                Route::get('/ambil_kecamatan', [WilayahController::class, 'ambil_kecamatan']);
                Route::get('/ambil_kelurahan', [WilayahController::class, 'ambil_kelurahan']);
            });

            Route::prefix('create')->group(function () {
                Route::resource('admin-kec', AdminKecController::class);
            });
            Route::get('/dashboard', [DashboardController::class, 'admin']);
        });
    });

    Route::group(['middleware' => ['can:admin_kec']], function () {
        Route::prefix('admin/kec')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin_kecamatan']);
            Route::prefix('create')->group(function () {
                Route::resource('admin-des', AdminDesController::class);
            });
        });
    });

    Route::group(['middleware' => ['can:admin_des']], function () {
        Route::prefix('admin/des')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin_desa']);
        });
    });
});

<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\WEB\Admin\Master\JabatanKabupatenController;
use App\Http\Controllers\WEB\Admin\Master\PermissionController;
use App\Http\Controllers\WEB\Admin\Pengaturan\ProfileController;
use App\Http\Controllers\WEB\Admin\Permission\RoleController;
use App\Http\Controllers\WEB\Admin\User\AdminKecController;
use App\Http\Controllers\WEB\Admin\User\StaffKabController;
use App\Http\Controllers\WEB\Admin\User\UserController;
use App\Http\Controllers\WEB\AdminKec\Master\JabatanKecamatanController;
use App\Http\Controllers\WEB\AdminKec\User\AdminDesController;
use App\Http\Controllers\WEB\Adminkec\User\StaffKecController;
use App\Http\Controllers\WEB\Auth\LoginController;
use App\Http\Controllers\WEB\Auth\LogoutController;
use App\Http\Controllers\WEB\Auth\NewPasswordController;
use App\Http\Controllers\WEB\Auth\RegisterController;
use App\Http\Controllers\WEB\Auth\ResetPasswordController;
use App\Http\Controllers\WEB\Auth\VerificationController;
use App\Http\Controllers\WEB\DashboardController;
use App\Http\Controllers\WEB\StaffKab\Persuratan\SuratMasukController;
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

Route::middleware(['guest'])->group(function () {

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
            Route::prefix('master')->group(function () {
                Route::resource('jabatan', JabatanKabupatenController::class);
                Route::resource('role', RoleController::class);
            });
            Route::prefix('create')->group(function () {
                Route::resource('admin-kec', AdminKecController::class);
                Route::resource('staff', StaffKabController::class);
            });
            Route::prefix('profile')->group(function () {
                Route::get('/', [ProfileController::class, 'index']);
                Route::get('/edit_profile', [ProfileController::class, 'edit']);
                Route::put('/proccess_edit_profile/{id}', [ProfileController::class, 'update_profile']);
                Route::put('/proccess_update_password/{id}', [ProfileController::class, 'update_password']);
            });
            Route::get('/dashboard', [DashboardController::class, 'admin']);
        });
    });

    Route::group(['middleware' => ['can:staff_kab']], function () {
        Route::prefix('staff/kab')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'staff_kab']);
            Route::get('/undermaintanance', function () {
                return view('admin.template.maintanance');
            });
            Route::resource('surat_masuk', SuratMasukController::class);
        });
    });


    Route::group(['middleware' => ['can:admin_kec']], function () {
        Route::prefix('admin/kec')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin_kecamatan']);
            Route::prefix('create')->group(function () {
                Route::resource('admin-des', AdminDesController::class);
                Route::resource('staff', StaffKecController::class);
            });

            Route::prefix('master')->group(function () {
                Route::resource('jabatan', JabatanKecamatanController::class);
            });
        });
    });

    Route::group(['middleware' => ['can:staff_kec']], function () {
        Route::prefix('staff/kec')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'staff_kecamatan']);
        });
    });

    Route::group(['middleware' => ['can:admin_des']], function () {
        Route::prefix('admin/des')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'admin_desa']);
        });
    });

    Route::group(['middleware' => ['can:staff_des']], function () {
        Route::prefix('staff/des')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'staff_desa']);
        });
    });
});

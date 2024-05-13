<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReimburseController;
use App\Http\Controllers\ReimbursementController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});
Route::get('/home', function () {
    return view('direktur.index');
})->name('home');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Route for Direktur only
    // Route::middleware("can:direktur")->prefix('direktur')->name('direktur.')->group(function () {
    //     Route::get('/home', function () {
    //         return view('direktur.index');
    //     })->name('home');
    // });
    // Reimbursement
    Route::prefix('reimbursement')->name('reimbursement.')->group(function () {
        Route::get('/process', [ReimburseController::class, 'indexProcess'])->name('indexProcess');
        Route::get('/accept', [ReimburseController::class, 'indexAccept'])->name('indexAccept');
        Route::get('/reject', [ReimburseController::class, 'indexReject'])->name('indexReject');
        Route::get('/finance', [ReimburseController::class, 'finance'])->name('finance');
        Route::post('/ajukan', [ReimburseController::class, 'store'])->name('ajukan');
        Route::get('/create', [ReimburseController::class, 'create'])->name('create');
        Route::get('/{id}/detail', [ReimburseController::class, 'detail'])->name('detail');
        Route::get('/{id}/edit', [ReimburseController::class, 'edit'])->name('edit');
        Route::post('/update', [ReimburseController::class, 'update'])->name('update');
    });
    Route::resource('/karyawan', UserController::class);
});

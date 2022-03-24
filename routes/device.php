<?php

use App\Http\Controllers\API\Device\AuthController;
use App\Http\Controllers\API\Device\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'validate.user']], function () {
});

Route::get('users', [UserController::class, 'index'])
    ->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])
    ->name('user.show');
Route::post('users', [UserController::class, 'store'])
    ->name('user.store');
Route::put('users/{user}', [UserController::class, 'update'])
    ->name('user.update');
Route::delete('users/{user}', [UserController::class, 'delete'])
    ->name('user.delete');
Route::post('users/bulk-create', [UserController::class, 'bulkStore'])
    ->name('user.store.bulk');
Route::post('users/bulk-update', [UserController::class, 'bulkUpdate'])
    ->name('user.update.bulk');

Route::post('register', [AuthController::class, 'register'])
    ->name('register');
Route::post('login', [AuthController::class, 'login'])
    ->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth:sanctum');
Route::put('change-password', [AuthController::class, 'changePassword'])
    ->name('change.password')
    ->middleware(['auth:sanctum', 'validate.user']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password');
Route::post('validate-otp', [AuthController::class, 'validateResetPasswordOtp'])
    ->name('reset.password.validate.otp');
Route::put('reset-password', [AuthController::class, 'resetPassword'])
    ->name('reset.password');

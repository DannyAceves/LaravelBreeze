<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\controladorCitas;
use App\Http\Controllers\controladorNotificaciones;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');
    

Route::get('/', [controladorNotificaciones::class, 'solo_categorias'])
    ->middleware('guest')
    ->name('welcome');

Route::get('/inicio', function () {
        return view('/inicio');
    })->middleware(['guest'])->name('inicio');

Route::get('/notificaciones', [controladorNotificaciones::class, 'notificaciones_generales'])
    ->middleware('guest')
    ->name('notificaciones');

Route::get('/nosotros', function () {
        return view('/nosotros');
    })->middleware(['guest'])->name('nosotros');

Route::get('/citas', function () {
        return view('/citas');
    })->middleware(['guest'])->name('citas');

Route::post('/citas', [controladorCitas::class, 'store'])
    ->middleware('guest');



//SESION INICIADA

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth','verified'])->name('dashboard');

//Dashboard Copy

Route::view('sessionsecreta','/sessions/sessionsecreta')
->name('sessions/sessionsecreta')
->middleware('password.confirm');


Route::view('sessionnosotros','/sessions/sessionnosotros')
->name('sessions/sessionnosotros');


Route::get('sessions/sessionnotificaciones', [controladorNotificaciones::class, 'sessionnotificaciones'])
    ->name('sessions/sessionnotificaciones');


Route::get('sessions/sessioncitas', [controladorCitas::class, 'sessionindex'])
    ->name('sessions/sessioncitas');

Route::post('sessions/sessioncitas', [controladorCitas::class, 'store']);


<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/notificaciones', function () {
    return view('notificaciones');
});
Route::get('/citas', function () {
    return view('citas');
});
Route::get('/nosotros', function () {
    return view('nosotros');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sessions/sessioncitas', function () {
    return view('/sessions/sessioncitas');
});




require __DIR__.'/auth.php';


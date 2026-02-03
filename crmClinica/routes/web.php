<?php

use App\Http\Controllers\Auth\Logincontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


route::middleware(['auth'])->group(function () {

    Route::middleware(['role:superAdmin'])->group(function () {
        Route::resource('users', UserController::class);
    });
});
//teste sem o midlleware por enquanto
Route::get('/login', function() {
    return view('auth.login');
})->name('login');//tela de login, entrar com email e senha

Route::post('/login', [Logincontroller::class,'authenticate'])->name('login.auth');

Route::post('/logout', [Logincontroller::class,'logout'])->name('logout');
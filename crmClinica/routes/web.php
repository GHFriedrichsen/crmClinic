<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});



//teste sem o midlleware por enquanto
Route::get('/login', function() {
    return view('auth.login');
});//tela de login, entrar com email e senha


//tabela users -- teste, logo irei mudar para resource
Route::get('/users', [UserController::class, 'index'])->name('users.index'); //mostra todos
Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); //form para pegar os dados
Route::post('/users', [UserController::class, 'store'])->name('users.store'); //salva no baco
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); // mostra melhor os dados de um user especifico
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // pega os dados do user para editar
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // edita no banco
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // apaga do banco

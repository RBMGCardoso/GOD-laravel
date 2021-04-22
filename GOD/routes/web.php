<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\UserAuthController;

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

Route::get('/dashboard', [MainController::Class, 'DashboardPage'])->name('dashboardPage');

Route::get('/ocorrencia', [MainController::Class, 'OcorrenciaPage'])->name('ocorrenciaPage');

Route::post('/ocorrencia', [MainController::Class, 'criarOcorrencia'])->name('ocorrencia.criar');

Route::get('/pesquisar', [MainController::Class, 'pesquisar'])->name('pesquisar');

Route::get('/nomeAluno', [MainController::Class, 'NomeAluno'])->name('aluno.nome');

Route::get('/registar', [MainController::Class, 'RegisterPage'])->name('registerPage');

Route::get('/registarAluno', [MainController::Class, 'RegisterAlunoPage'])->name('registerAlunoPage');

Route::post('/registarAlunoPost', [MainController::Class, 'RegisterAluno'])->name('register.aluno');

Route::get('/login', [UserAuthController::Class, 'Login'])->name('login');

Route::get('/logout', [UserAuthController::Class, 'logout'])->name('logout');

Route::post('check', [UserAuthController::Class, 'check'])->name('auth.check');

Route::get('ocorrencias', [OcorrenciaController::Class, 'index'])->name('mostrarOcorrencias');

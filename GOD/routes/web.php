<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PesquisaController;

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

//// Login
//
Route::get('/', [UserAuthController::Class, 'Login'])->name('login');
Route::post('check', [UserAuthController::Class, 'check'])->name('auth.check');
Route::get('/logout', [UserAuthController::Class, 'logout'])->name('logout');


//// Página de ocorrência
//
Route::middleware([CheckSession::class])->group(function(){
    Route::get('/ocorrencia', [MainController::Class, 'OcorrenciaPage'])->name('ocorrenciaPage'); //View de criar a ocorrencia
    Route::post('/ocorrencia', [MainController::Class, 'criarOcorrencia'])->name('ocorrencia.criar'); //Post para enviar a ocorrencia para a DB

    Route::get('/dashboard', [MainController::Class, 'DashboardPage'])->name('dashboardPage'); //View da dashboard

    Route::get('/registar', [MainController::Class, 'RegisterPage'])->name('registerPage'); //View registar utilizador
    Route::post('registarPost', [MainController::Class, 'RegisterUtilizador'])->name('register.utilizador'); //Post para enviar utilizador para a DB

    Route::get('/registarAluno', [MainController::Class, 'RegisterAlunoPage'])->name('registerAlunoPage'); //View registar aluno
    Route::post('/registarAlunoPost', [MainController::Class, 'RegisterAluno'])->name('register.aluno'); //Post para enviar aluno para a DB


    Route::get('ocorrencias', [OcorrenciaController::Class, 'index'])->name('mostrarOcorrencias'); //View da página de pesquisa

    Route::get('ocorrenciasAtualizarTurmas', [OcorrenciaController::Class, 'AtualizarTurmas'])->name('atualizarTurmas'); //Ajax para adicionar turmas á select na pesquisa
    Route::get('ocorrenciasAtualizarAlunos', [OcorrenciaController::Class, 'AtualizarAlunos'])->name('atualizarAlunos'); //Ajax para atualizar os alunos dependendo da pesquisa

    Route::get('alunos/{idAluno}', [OcorrenciaController::Class, 'perfilAluno'])->name('perfilAluno'); //View do perfil do aluno
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\DashboardController;

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


//// Página de ocorrência
//
Route::middleware([CheckSession::class])->group(function(){
    Route::get('/ocorrencia', [MainController::Class, 'OcorrenciaPage'])->name('ocorrenciaPage'); //View de criar a ocorrencia
    Route::get('/ocorrenciaNomeCheck', [MainController::Class, 'OcorrenciaNomeCheck'])->name('ocorrenciaNomeCheck'); // AJAX para verificar se o nome do aluno existe
    Route::get('/ocorrenciaAtualizarAlunos', [MainController::Class, 'OcorrenciaAtualizarAlunos'])->name('ocorrenciaAtualizarAlunos'); // AJAX para verificar se o nome do aluno existe
    Route::post('/ocorrencia', [MainController::Class, 'criarOcorrencia'])->name('ocorrencia.criar'); //Post para enviar a ocorrencia para a DB

    Route::get('/dashboard', [DashboardController::Class, 'DashboardPage'])->name('dashboardPage'); //View da dashboard
    Route::get('/dashboardGraficoOcorrencias', [DashboardController::Class, 'GraficoOcorrencias'])->name('grafOcc'); //AJAX para buscar quantidade de occs
    Route::get('/dashboardGraficoOcorrencias2', [DashboardController::Class, 'GraficoOcorrencias2'])->name('grafOcc2');
    
    Route::post('/dashboardEliminarNotification', [DashboardController::Class, 'EliminarNotification'])->name('eliminarNotif'); //AJAX para eliminar notificações
    Route::get('/dashboardFiltrarOcorrencias', [DashboardController::Class, 'FiltrarOccs'])->name('filtrarOccs'); //AJAX para filtrar ocorrencias
    
    Route::middleware([CheckCargoDiretor::class])->group(function(){ //Middleware de cargos. Apenas diretores e pessoal da secretaria pode acessar estas páginas
            Route::get('/registar', [MainController::Class, 'RegisterPage'])->name('registerPage'); //View registar utilizador
            Route::post('registarPost', [MainController::Class, 'RegisterUtilizador'])->name('register.utilizador'); //Post para enviar utilizador para a DB
        
            Route::get('/registar-aluno', [MainController::Class, 'RegisterAlunoPage'])->name('registerAlunoPage'); //View registar aluno
            Route::post('/registar-AlunoPost', [MainController::Class, 'RegisterAluno'])->name('register.aluno'); //Post para enviar aluno para a DB      
        
            Route::get('registar-escola', [MainController::Class, 'registerEscolas'])->name('registerEscolas'); //View registar escola
            Route::post('registar-escolaPost', [MainController::Class, 'registerEscolasPost'])->name('registerEscolasPost'); //Post registar escola
            
            Route::get('registar-turma', [MainController::Class, 'registerTurmas'])->name('registerTurmas');
            Route::post('registar-turmaPost', [MainController::Class, 'registerTurmasPost'])->name('registerTurmasPost');

            Route::get('ocorrencias', [OcorrenciaController::Class, 'index'])->name('mostrarOcorrencias'); //View da página de pesquisa

            Route::get('ocorrenciasAtualizarAlunos', [OcorrenciaController::Class, 'AtualizarAlunos'])->name('atualizarAlunos'); //Ajax para atualizar os alunos dependendo da pesquisa
        }
    );

    Route::get('ocorrenciasAtualizarTurmas', [OcorrenciaController::Class, 'AtualizarTurmas'])->name('atualizarTurmas'); //Ajax para adicionar turmas á select na pesquisa

    Route::get('minhas-ocorrencias', [MainController::Class, 'minhasOcc'])->name('minhasOcc'); //View das ocorrencias criadas pelo utilizador

    Route::get('ocorrencia/{idOcc}', [MainController::Class, 'pagOcc'])->name('pagOcc'); //View das ocorrencias criadas pelo utilizador
    Route::post('alterarEstado', [MainController::Class, 'AlterarEstado'])->name('alterarEstado'); //Alterar estado de ocorrencia

    Route::get('minha-turma', [MainController::Class, 'dirTurma'])->name('minhaTurma'); //View da direção de turma de um diretor de turma
    
    Route::get('alunos/{idAluno}', [OcorrenciaController::Class, 'perfilAluno'])->name('perfilAluno'); //View do perfil do aluno

    Route::get('pesquisa-user', [MainController::Class, 'pesquisaUser'])->name('pesquisaUser'); // View da pagina de pesquisa do utilizador
    Route::get('user', [MainController::Class, 'perfilUser'])->name('perfilUser');// View da pagina do utilizador

    Route::get('/logout', [UserAuthController::Class, 'logout'])->name('logout');
});
